<?php

// path to twitteroauth
require_once( get_template_directory() . '/inc/twitteroauth/twitteroauth/twitteroauth.php' );

// setup varibles
$modules = get_option( 'reza_modules' );

// user settings
$user    = $modules['tweets_username'];
$count   = 1;

// key settings
$apikey            = $modules['tweets_api_key'];
$apisecret         = $modules['tweets_api_secret'];
$accesstoken       = $modules['tweets_access_token'];
$accesstokensecret = $modules['tweets_access_token_secret'];

function getConnectionWithAccessToken( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret ) 
{
    $connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );
    return $connection;
}
$connection = getConnectionWithAccessToken( $apikey, $apisecret, $accesstoken, $accesstokensecret );

$tweets = $connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$user."&count=".$count );

/**
 * Find links and create the hyperlinks
 */
function links($tweets) 
{
    $tweets = preg_replace( '/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $tweets );
    $tweets = preg_replace( '/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $tweets );

    // match @username
    $tweets = preg_replace( '/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $tweets );

    // match name@address
    $tweets = preg_replace( "/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $tweets );

    //match #trending
    $tweets = preg_replace( '/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $tweets );
    return $tweets;
}

/**
 * Relative time function
 */
function relative_time($date, $prefix = 'Tweeted about ', $postfix = ' ago', $fallback = 'F Y')
{
    $diff = time() - strtotime($date);
    
    if ( $diff < 60 )
        return $prefix . $diff . ' second'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round( $diff/60 );
    
    if ( $diff < 60 )
        return $prefix . $diff . ' minute'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round( $diff/60 );
    
    if ( $diff < 24 )
        return $prefix . $diff . ' hour'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round( $diff/24 );
    
    if ( $diff < 7 )
        return $prefix . $diff . ' day'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round( $diff/7 );
    
    if ( $diff < 4 )
        return $prefix . $diff . ' week'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round( $diff/4 );
    
    if ( $diff < 12 )
        return $prefix . $diff . ' month'. ($diff != 1 ? 's' : '') . $postfix;

    return date( $fallback, strtotime( $date ) );
}

?>
<?php if ( $tweets ) : ?>
    <div id="twitter" class="widget">
        <ul class="tweets nolist">
            <h6><?php esc_html_e( "Live from Twitter", "twentysixteen" ); ?></h6>
            <?php foreach ( $tweets as $tweet ) : ?>
                <li>
                    <span class="tweet-date"><?php echo esc_html( relative_time( $tweet->created_at ) ); ?></span>
                    <?php print( links( $tweet->text ) ); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>