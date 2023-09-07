<?php

return [
    'appId' => '397069834542225',
    'instagramRedirectUrl' => 'https://twhive.com/verify/auth/instagram/',
    //'instagram' => 'https://api.instagram.com/oauth/authorize?client_id=965902173847692&redirect_uri=https://twhive.com/verify/auth/instagram/&scope=user_profile,user_media&response_type=code',
    'instagram' => 'https://api.instagram.com/oauth/authorize?client_id=965902173847692&redirect_uri='.urlencode('https://twhive.com/verify/auth/instagram/').'&scope=user_profile,user_media&response_type=code',
    'instagramBaseGraphUrl' => 'https://graph.instagram.com/me?fields=',
    'instagramGraphUrl' => 'https://graph.facebook.com/v3.2/',
    'instagramGetAccessTokenUrl' => 'https://api.instagram.com/oauth/access_token',
    // IG sec key 9f7198f4827900e29f822cc9eeee6ab4

    'facebookRedirectUrl' => 'https://twhive.com/verify/auth/facebook/',
    'facebookGraphUrl' => 'https://graph.facebook.com/',
    'facebookGraph8_0Url' => 'https://graph.facebook.com/v8.0/',
    'facebookGraph3_2Url' => 'https://graph.facebook.com/v3.2/',
    'facebookGetPageListUrl' => 'https://graph.facebook.com/v8.0/me/accounts?access_token=',
    'facebookGetPageDataUrl' => 'https://graph.facebook.com/v8.0/me/accounts?access_token=',

    'facebook' => 'https://api.instagram.com/oauth/authorize?client_id=965902173847692&redirect_uri='.urlencode('https://twhive.com/verify/auth/instagram/').'&scope=user_profile,user_media&response_type=code',

    'googleAutocompleteUrl' => 'https://maps.googleapis.com/maps/api/place/autocomplete/json?',
];
