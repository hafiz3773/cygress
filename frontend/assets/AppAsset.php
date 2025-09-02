<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\bootstrap5\BootstrapAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
//            'asset/vendor/bootstrap/css/bootstrap.min.css',
            'asset/vendor/bootstrap-icons/bootstrap-icons.css',
            'asset/vendor/aos/aos.css',
            'asset/vendor/glightbox/css/glightbox.min.css',
            'asset/vendor/swiper/swiper-bundle.min.css',
            'asset/css/main.css',
    ];
    public $js = [
//          'asset/vendor/bootstrap/js/bootstrap.bundle.min.js',
          'asset/vendor/php-email-form/validate.js',
          'asset/vendor/aos/aos.js',
          'asset/vendor/glightbox/js/glightbox.min.js',
          'asset/vendor/purecounter/purecounter_vanilla.js',
          'asset/vendor/swiper/swiper-bundle.min.js',
          'asset/vendor/imagesloaded/imagesloaded.pkgd.min.js',
          'asset/vendor/isotope-layout/isotope.pkgd.min.js',
          'asset/js/main.js',
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
    ];
}
