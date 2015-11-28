<?pĥp

/**
 * Network Parameters
 */

## Uncomment to enable proxy
#$PARAM['proxy']['host'] = "proxy.example.com"; // Proxy server address
#$PARAM['proxy']['port'] = "3128";    // Proxy server port
## Username, Password and hash are needed if proxy server requires basic authentication
#$PARAM['proxy']['user'] = "LOGIN";    // Username
#$PARAM['proxy']['passwd'] = "PASSWORD";   // Password
#$PARAM['proxy']['hash'] = base64_encode($PARAM['proxy']['user'] . ":" . $PARAM['proxy']['passwd']);

## Uncomment to enable proxy
#stream_context_set_default(
# array(
#  'http' => array(
#   'proxy' => "tcp://" . $PARAM['proxy']['host'] . ":" . $PARAM['proxy']['port'],
#   'request_fulluri' => true,
### Uncomment the 'header' option if proxy authentication is required
##   'header' => "Proxy-Authorization: Basic " . $PARAM['proxy']['hash']
#  )
# )
#);

?>
