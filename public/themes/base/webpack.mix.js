const mix = require('laravel-mix');

// Admin
mix.webpackConfig({
    output: {
        path:__dirname+'/../../dist/frontend',
    }

});

mix.sass('../../sass/app.scss','css');
mix.sass('../../sass/contact.scss','css');
mix.sass('../../sass/rtl.scss','css');
mix.sass('../../sass/notification.scss','css');
// ----------------------------------------------------------------------------------------------------
//Booking
mix.sass('../../module/order/scss/checkout.scss','module/order/css');
mix.sass('../../module/user/scss/user.scss','module/user/css');
mix.sass('../../module/user/scss/profile.scss','module/user/css');
mix.sass('../../module/news/scss/news.scss','module/news/css');
mix.sass('../../module/media/scss/browser.scss','module/media/css');
mix.sass('../../module/location/scss/location.scss','module/location/css');
mix.sass('../../module/social/scss/social.scss','module/social/css');
mix.sass('../../module/gig/scss/gig.scss','module/gig/css');
