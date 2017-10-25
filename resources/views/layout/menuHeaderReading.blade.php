<?php
/**
 * Created by PhpStorm.
 * User: BiPham
 * Date: 7/25/2017
 * Time: 10:16 PM
 */
?>
<div class="menu-fix-custom">
    <div class="container">
        <div class="menu menu-reading">
            <div class="pull-right action-user-center-fixed">
                {{--@include('utils.actionCenterUser')--}}
            </div>
            <ul class="nav nav-tabs" id="myTabReading" role="tablist">
                <li class="logo-reading-menu img-thumbnail-middle">
                    <div class="img-thumbnail-inner">
                        <a href="/" class="brand-web">
                            <img src="/public/imgs/original/logo.jpg" alt="Logo" class="img-custom img-middle-responsive img-logo-reading-menu">
                        </a>
                    </div>
                </li>
                <li class="nav-item title-lesson-header">
                    <h4 class="title-type-lesson">
                        @yield('titleTypeLesson')
                    </h4>
                    @yield('typeLessonHeader')
                </li>
            </ul>
        </div>
    </div>
</div>
