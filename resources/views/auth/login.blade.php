<!DOCTYPE html>
<html lang="en"
    style="--hero:#A61F67; --hero-hover:#bb2374; --hero-sc:#ffffff; --hero-rgb:166, 31, 103; --hero-sc-rgb:255, 255, 255;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice by Metags</title>
    <style data-cssvars="out" data-cssvars-job="1" data-cssvars-group="1">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600,700);

        footer {
            width: 100%;
            border-top: .1rem solid rgba(30, 42, 70, .1);
            border-top: .1rem solid rgba(var(--b-sc-rgb), .1);
        }

        .root-container>footer {
            background: #fff;
            background: var(--b);
            border: 0;
        }

        @media screen and (max-width:667px) {
            footer {
                padding: 2rem 0;
            }
        }

        footer ul {
            width: 100%;
            height: 5rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        @media screen and (max-width:667px) {
            footer ul {
                -webkit-flex-direction: column;
                -moz-box-orient: vertical;
                -moz-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                font-size: 1.1rem;
                height: auto;
                text-align: center;
            }
        }

        footer ul>li:first-child {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
        }

        @media screen and (max-width:667px) {
            footer ul>li:first-child {
                margin: 0 0 2rem;
            }
        }

        footer ul>li:last-child {
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        footer ul>li:last-child>*+* {
            margin: 0 0 0 3.5rem;
        }

        @media screen and (max-width:667px) {
            footer ul>li:last-child>*+* {
                margin: 0 0 0 1.8rem;
            }
        }

        footer a {
            color: #2a63b9;
            color: var(--link);
        }

        @media (hover:hover) {
            footer a:hover {
                color: #3a76d2;
                color: var(--link-hover);
            }
        }

        .company-name {
            text-transform: uppercase;
            font-weight: 600;
        }

        .news-section-holder {
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: stretch;
            -moz-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
        }

        .news-head,
        .news-section-holder {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        .news-head {
            -webkit-align-items: baseline;
            -moz-box-align: baseline;
            -ms-flex-align: baseline;
            align-items: baseline;
            font: 700 2.2rem/3rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            margin: 0 0 2.2rem;
        }

        @media screen and (max-width:667px) {
            .news-head {
                font-size: 1.6rem;
                margin: 0 0 1.6rem;
            }
        }

        .news-head>li {
            overflow: hidden;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: baseline;
            -moz-box-align: baseline;
            -ms-flex-align: baseline;
            align-items: baseline;
        }

        .news-head>li:first-child {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
        }

        .news-head a {
            font: 1.6rem/1 "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            color: rgba(30, 42, 70, .8);
            color: rgba(var(--b-sc-rgb), .8);
        }

        @media (hover:hover) {
            .news-head a:hover {
                color: #1e2a46;
                color: var(--b-sc);
            }
        }

        @media screen and (max-width:667px) {
            .news-head a {
                font-size: 1.6rem;
            }
        }

        .new-items-holder {
            width: 100%;
            overflow: hidden;
        }

        @media screen and (max-width:667px) {
            .new-items-holder {
                width: -webkit-calc(100% + 4rem);
                width: -moz-calc(100% + 4rem);
                width: calc(100% + 4rem);
                margin: 0 -2rem 3rem;
                overflow-y: hidden;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }

        .new-items-holder>ul {
            min-width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        @media screen and (max-width:667px) {
            .new-items-holder>ul {
                padding: 0 2rem 1.5rem;
            }

            .new-items-holder>ul:after {
                content: "";
                display: block;
                width: .1rem;
                height: .1rem;
                -webkit-flex-shrink: 0;
                -ms-flex-negative: 0;
                flex-shrink: 0;
                margin: 0 0 0 1rem;
            }
        }

        .new-items-holder>ul>li {
            width: -webkit-calc(33.33333% - .93333rem);
            width: -moz-calc(33.33333% - .93333rem);
            width: calc(33.33333% - .93333rem);
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        @media screen and (max-width:667px) {
            .new-items-holder>ul>li {
                width: 16.8rem;
                margin: 0 1rem 0 0;
            }
        }

        @media screen and (min-width:668px) {
            .new-items-holder>ul>li+li {
                margin: 0 0 0 1.4rem;
            }
        }

        .news-story {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            word-break: break-word;
        }

        .news-story figure {
            padding: 62.72727% 0 0;
            -webkit-border-radius: .6rem;
            -moz-border-radius: .6rem;
            border-radius: .6rem;
            background: no-repeat 50% 50%/cover;
            -webkit-transition: -webkit-filter .3s;
            transition: -webkit-filter .3s;
            -o-transition: .3s filter;
            -moz-transition: .3s filter;
            transition: filter .3s;
            transition: filter .3s, -webkit-filter .3s;
        }

        .news-story figure.skeleton {
            background: -webkit-linear-gradient(315deg, rgba(30, 42, 70, .07), rgba(30, 42, 70, .05) 50%, rgba(30, 42, 70, .07)) 0 0/200%;
            background: -webkit-linear-gradient(315deg, rgba(var(--b-sc-rgb), .07), rgba(var(--b-sc-rgb), .05) 50%, rgba(var(--b-sc-rgb), .07)) 0 0/200%;
            background: -moz-linear-gradient(315deg, rgba(30, 42, 70, .07) 0, rgba(30, 42, 70, .05) 50%, rgba(30, 42, 70, .07) 100%) 0 0/200%;
            background: -moz-linear-gradient(315deg, rgba(var(--b-sc-rgb), .07) 0, rgba(var(--b-sc-rgb), .05) 50%, rgba(var(--b-sc-rgb), .07) 100%) 0 0/200%;
            background: -o-linear-gradient(315deg, rgba(30, 42, 70, .07) 0, rgba(30, 42, 70, .05) 50%, rgba(30, 42, 70, .07) 100%) 0 0/200%;
            background: -o-linear-gradient(315deg, rgba(var(--b-sc-rgb), .07) 0, rgba(var(--b-sc-rgb), .05) 50%, rgba(var(--b-sc-rgb), .07) 100%) 0 0/200%;
            background: linear-gradient(135deg, rgba(30, 42, 70, .07), rgba(30, 42, 70, .05) 50%, rgba(30, 42, 70, .07)) 0 0/200%;
            background: linear-gradient(135deg, rgba(var(--b-sc-rgb), .07), rgba(var(--b-sc-rgb), .05) 50%, rgba(var(--b-sc-rgb), .07)) 0 0/200%;
            -webkit-animation: sp-skeleton .3s linear infinite;
            -moz-animation: sp-skeleton .3s infinite linear;
            -o-animation: sp-skeleton .3s infinite linear;
            animation: sp-skeleton .3s linear infinite;
        }

        a.news-story .n-title-holder {
            overflow: hidden;
            max-height: 0;
            opacity: 0;
            -webkit-animation: text-reveal 1s forwards;
            -moz-animation: 1s text-reveal forwards;
            -o-animation: 1s text-reveal forwards;
            animation: text-reveal 1s forwards;
        }

        @-webkit-keyframes text-reveal {
            to {
                opacity: 1;
                max-height: 10rem;
            }
        }

        @-moz-keyframes text-reveal {
            to {
                opacity: 1;
                max-height: 10rem;
            }
        }

        @-o-keyframes text-reveal {
            to {
                opacity: 1;
                max-height: 10rem;
            }
        }

        @keyframes text-reveal {
            to {
                opacity: 1;
                max-height: 10rem;
            }
        }

        .news-story p {
            width: 100%;
            font: 1.4rem/2rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            color: rgba(30, 42, 70, .9);
            color: rgba(var(--b-sc-rgb), .9);
            padding: .8rem .5rem 0;
        }

        @media screen and (max-width:667px) {
            .news-story p {
                font: 1.2rem/1.8rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            }
        }

        @media (hover:hover) {
            .news-story:hover figure {
                -webkit-filter: brightness(1.2);
                filter: brightness(1.2);
            }

            .news-story:hover p {
                color: #1e2a46;
                color: var(--b-sc);
            }
        }

        @-webkit-keyframes sp-skeleton {
            to {
                background-position: -200%;
            }
        }

        @-moz-keyframes sp-skeleton {
            to {
                background-position: -200%;
            }
        }

        @-o-keyframes sp-skeleton {
            to {
                background-position: -200%;
            }
        }

        @keyframes sp-skeleton {
            to {
                background-position: -200%;
            }
        }

        .left-blocks-holder {
            padding: 8rem 0;
            padding: var(--gap) 0;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: stretch;
            -moz-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            width: 100%;
        }

        @media screen and (min-height:530px) {
            .left-blocks-holder {
                padding: 2rem 0;
                margin: auto;
            }
        }

        .left-blocks-holder h1 {
            font: 700 2.2rem/3rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            margin: 0 0 1.6rem;
        }

        @media screen and (max-width:667px) {
            .left-blocks-holder h1 {
                font: 700 2.2rem/3rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
                margin: 0 0 1.6rem;
            }
        }

        .left-blocks-holder h2 {
            font: 300 1.6rem/2.2rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            margin: 0 0 2rem;
        }

        .left-blocks-holder hr {
            width: 100%;
            border-top: .1rem solid rgba(30, 42, 70, .1);
            border-top: .1rem solid rgba(var(--b-sc-rgb), .1);
            margin: 0 0 2rem;
        }

        @media screen and (max-width:667px) {
            .left-blocks-holder hr {
                margin-top: .8rem;
            }
        }

        .our-brands-holder {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            font-size: 3rem;
        }

        @media screen and (max-width:667px) {
            .our-brands-holder {
                font-size: 2.2rem;
            }
        }

        .our-brands-holder>* {
            width: -webkit-calc(33.33333% - 2rem);
            width: -moz-calc(33.33333% - 2rem);
            width: calc(33.33333% - 2rem);
            margin: 0 0 3rem;
        }

        .our-brands-holder>:nth-child(2) {
            margin: 0 3rem 3rem;
        }

        @media screen and (max-width:667px) {
            .our-brands-holder>* {
                width: -webkit-calc(50% - 1.9rem);
                width: -moz-calc(50% - 1.9rem);
                width: calc(50% - 1.9rem);
                margin: 0 0 2.2rem;
            }

            .our-brands-holder>:first-child,
            .our-brands-holder>:nth-child(3) {
                margin: 0 1.9rem 2.2rem 0;
            }

            .our-brands-holder>:nth-child(2),
            .our-brands-holder>:nth-child(4) {
                margin: 0 0 2.2rem 1.9rem;
            }
        }

        .our-brands-holder ul {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 3rem;
        }

        @media screen and (max-width:667px) {
            .our-brands-holder ul {
                height: 2.2rem;
            }
        }

        .our-brands-holder ul>li {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        .our-brands-holder ul>li:first-child {
            -webkit-border-radius: .6rem;
            -moz-border-radius: .6rem;
            border-radius: .6rem;
            color: #fff;
        }

        .our-brands-holder ul>li:first-child.icon-spring-builder-shape {
            color: #fff;
            color: var(--b);
        }

        .our-brands-holder ul>li:last-child {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            margin: 0 0 0 1.4rem;
        }

        @media screen and (max-width:667px) {
            .our-brands-holder ul>li:last-child {
                margin: 0 0 0 1rem;
            }
        }

        header {
            min-height: 6rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background: #fff;
            background: var(--b);
            position: -webkit-sticky;
            position: sticky;
            z-index: 800;
            top: 0;
        }

        @media screen and (max-width:667px) {
            header {
                height: 8rem;
            }
        }

        header>ul,
        header>ul>li {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        header>ul>li:first-child {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
        }

        header>ul>li:last-child {
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        header>ul>li>hr {
            margin: 0 2.4rem;
            width: .1rem;
            display: block;
            height: 2.8rem;
            background: rgba(30, 42, 70, .1);
            background: rgba(var(--b-sc-rgb), .1);
            -webkit-transition: opacity .25s;
            -o-transition: .25s opacity;
            -moz-transition: .25s opacity;
            transition: opacity .25s;
        }

        header>ul>li>hr:nth-last-child(2):first-child {
            opacity: 0;
        }

        @media screen and (max-width:667px) {
            header>ul>li>hr {
                margin: 0 2rem;
            }
        }

        header .icon-logo-account,
        header .letter-logo-account {
            cursor: pointer;
            font-size: 1.8rem;
            -webkit-transition: color .4s;
            -o-transition: .4s color;
            -moz-transition: .4s color;
            transition: color .4s;
        }

        @media (hover:hover) {

            header .icon-logo-account:hover,
            header .letter-logo-account:hover {
                color: #4345e7;
                color: #a61f67;
            }
        }

        @media screen and (max-width:667px) {

            header .icon-logo-account,
            header .letter-logo-account {
                font-size: 1.6rem;
            }
        }

        header .letter-logo-account {
            text-transform: uppercase;
            font-weight: 700;
        }

        header .bet-construct-products-holder {
            opacity: 0;
            -webkit-animation: bet-construct-products-holder .25s forwards;
            -moz-animation: bet-construct-products-holder .25s forwards;
            -o-animation: bet-construct-products-holder .25s forwards;
            animation: bet-construct-products-holder .25s forwards;
        }

        @-webkit-keyframes bet-construct-products-holder {
            to {
                opacity: 1;
            }
        }

        @-moz-keyframes bet-construct-products-holder {
            to {
                opacity: 1;
            }
        }

        @-o-keyframes bet-construct-products-holder {
            to {
                opacity: 1;
            }
        }

        @keyframes bet-construct-products-holder {
            to {
                opacity: 1;
            }
        }

        .profile-i-holder {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: flex-end;
            -moz-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end;
            white-space: nowrap;
            width: 100%;
        }

        .profile-i-holder button {
            height: 2.4rem;
            padding: 0 2rem;
            background: rgba(224, 47, 71, .15);
            background: rgba(var(--danger-rgb), .15);
            color: #e02f47;
            color: var(--danger);
            font: 700 1.2rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            -webkit-border-radius: 3.6rem;
            -moz-border-radius: 3.6rem;
            border-radius: 3.6rem;
            cursor: pointer;
            -webkit-transition: color .4s, background .4s;
            -o-transition: .4s color, .4s background;
            -moz-transition: .4s color, .4s background;
            transition: color .4s, background .4s;
        }

        @media (hover:hover) {
            .profile-i-holder button:hover {
                background: #e02f47;
                background: var(--danger);
                color: #fff;
            }
        }

        @media screen and (max-width:667px) {
            .profile-i-holder button {
                height: 3.6rem;
                padding: 0 2.4rem;
                font-size: 1.4rem;
            }
        }

        .user-profile-info {
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            margin: 0 0 .8rem;
        }

        .user-profile-info,
        .user-profile-info>li {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        .user-profile-info>li {
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .user-profile-info>li:first-child {
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            margin: 0 1.2rem 0 0;
        }

        .user-profile-info>li:last-child {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            overflow: hidden;
        }

        .user-profile-info>li>* {
            cursor: pointer;
        }

        .user-profile-info h5 {
            font-size: 2rem;
            margin: 0 0 .4rem;
            font-weight: 700;
            -webkit-transition: opacity .4s;
            -o-transition: .4s opacity;
            -moz-transition: .4s opacity;
            transition: opacity .4s;
            opacity: .8;
        }

        @media (hover:hover) {
            .user-profile-info h5:hover {
                opacity: 1;
            }
        }

        .user-profile-info h6 {
            font-size: 1.2rem;
            font-weight: 400;
            -webkit-transition: opacity .4s;
            -o-transition: .4s opacity;
            -moz-transition: .4s opacity;
            transition: opacity .4s;
            opacity: .5;
        }

        @media (hover:hover) {
            .user-profile-info h6:hover {
                opacity: .8;
            }
        }

        .header-actions .drop-icon.icon-user {
            font-size: 1.8rem;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            color: rgba(30, 42, 70, .5);
            color: rgba(var(--b-sc-rgb), .5);
            background: rgba(30, 42, 70, .08) no-repeat 50% 50%/cover;
            background: rgba(var(--b-sc-rgb), .08) no-repeat 50% 50%/cover;
            -webkit-transition: color .4s, background .4s;
            -o-transition: .4s color, .4s background;
            -moz-transition: .4s color, .4s background;
            transition: color .4s, background .4s;
            position: relative;
        }

        .header-actions .drop-icon.icon-user:after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            background: rgba(0, 0, 0, 0);
            -webkit-transition: background .4s;
            -o-transition: .4s background;
            -moz-transition: .4s background;
            transition: background .4s;
        }

        .header-actions .drop-icon.icon-user.big {
            width: 6rem;
            height: 6rem;
            font-size: 2.4rem;
        }

        .header-actions .drop-icon.icon-user[style]:before {
            content: none;
        }

        @media (hover:hover) {
            .header-actions .drop-icon.icon-user[style]:hover:after {
                background: rgba(0, 0, 0, .1);
            }
        }

        @media (hover:hover) {
            .header-actions .drop-icon.icon-user:hover {
                color: rgba(30, 42, 70, .8);
                color: rgba(var(--b-sc-rgb), .8);
            }
        }

        .header-actions .drop-holder {
            position: relative;
        }

        @media screen and (max-width:667px) {
            .header-actions .drop-holder {
                position: static !important;
            }
        }

        .header-actions .drop-icon {
            width: 4.2rem;
            height: 4.2rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            cursor: pointer;
        }

        .header-actions svg.drop-icon {
            width: 2.4rem;
            height: 2.4rem;
            cursor: pointer;
        }

        .header-actions svg.drop-icon path {
            fill: rgba(30, 42, 70, .5);
            fill: rgba(var(--b-sc-rgb), .5);
            -webkit-transition: fill .4s;
            -o-transition: .4s fill;
            -moz-transition: .4s fill;
            transition: fill .4s;
        }

        @media (hover:hover) {
            .header-actions svg.drop-icon path:hover {
                fill: rgba(30, 42, 70, .8);
                fill: rgba(var(--b-sc-rgb), .8);
            }
        }

        .header-actions .drop-content-holder {
            position: absolute;
            top: 100%;
            right: 0;
            z-index: 700;
            background: #fff !important;
            background: var(--b) !important;
            -webkit-border-radius: .4rem;
            -moz-border-radius: .4rem;
            border-radius: .4rem;
            white-space: nowrap;
            max-height: 0;
            overflow: hidden;
            -webkit-transition: max-height .9s linear, padding .4s, opacity .4s, visibility .4s;
            -o-transition: .9s max-height linear, .4s padding, .4s opacity, .4s visibility;
            -moz-transition: .9s max-height linear, .4s padding, .4s opacity, .4s visibility;
            transition: max-height .9s linear, padding .4s, opacity .4s, visibility .4s;
            opacity: 0;
            visibility: hidden;
            padding: 0 2rem;
            -webkit-box-shadow: 0 .3rem .6rem rgba(0, 0, 0, .1);
            -moz-box-shadow: 0 .3rem .6rem rgba(0, 0, 0, .1);
            box-shadow: 0 .3rem .6rem rgba(0, 0, 0, .1);
            margin: .4rem 0 0;
            max-width: 34rem;
        }

        @media screen and (max-width:667px) {
            .header-actions .drop-content-holder {
                width: 100%;
                margin: 0 !important;
                -webkit-box-shadow: 0 1.2rem 1.2rem rgba(0, 0, 0, .1) !important;
                -moz-box-shadow: 0 1.2rem 1.2rem rgba(0, 0, 0, .1) !important;
                box-shadow: 0 1.2rem 1.2rem rgba(0, 0, 0, .1) !important;
                border-top: .1rem solid rgba(30, 42, 70, .1);
                border-top: .1rem solid rgba(var(--b-sc-rgb), .1);
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-justify-content: center;
                -moz-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-border-radius: 0 0 2rem 2rem !important;
                -moz-border-radius: 0 0 2rem 2rem !important;
                border-radius: 0 0 2rem 2rem !important;
                max-width: inherit;
            }
        }

        .header-actions .drop-content-holder.opened {
            visibility: visible;
            opacity: 1;
            max-height: 60rem;
            padding: 1.6rem 2rem;
        }

        .header-actions .drop-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
        }

        .header-actions .drop-backdrop.hide {
            display: none;
        }

        .header-actions .products-popover {
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            text-align: center;
            width: 30rem;
        }

        .header-actions .products-popover,
        .header-actions .products-popover>a {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        .header-actions .products-popover>a {
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            font: 500 1.2rem/1.4rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            height: 10rem;
            width: 10rem;
            -webkit-border-radius: .4rem;
            -moz-border-radius: .4rem;
            border-radius: .4rem;
            color: rgba(30, 42, 70, .6) !important;
            color: rgba(var(--b-sc-rgb), .6) !important;
        }

        .header-actions .products-popover>a img {
            width: 4.8rem;
            height: 4.8rem;
            margin: 0 0 1.2rem;
        }

        .header-actions .products-popover>a img,
        .header-actions .products-popover>a span {
            display: block;
            -webkit-transition: -webkit-transform .4s;
            transition: -webkit-transform .4s;
            -o-transition: .4s -o-transform;
            -moz-transition: .4s transform, .4s -moz-transform;
            transition: transform .4s;
            transition: transform .4s, -webkit-transform .4s, -moz-transform .4s, -o-transform .4s;
        }

        @media (hover:hover) {
            .header-actions .products-popover>a:hover img {
                -webkit-transform: scale(1.1);
                -moz-transform: scale(1.1);
                -ms-transform: scale(1.1);
                -o-transform: scale(1.1);
                transform: scale(1.1);
            }

            .header-actions .products-popover>a:hover span {
                -webkit-transform: translateY(.3rem);
                -moz-transform: translateY(.3rem);
                -ms-transform: translateY(.3rem);
                -o-transform: translateY(.3rem);
                transform: translateY(.3rem);
            }
        }

        .layout-holder {
            width: 100%;
            min-height: 100%;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .layout-holder,
        .layout-holder>li {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        @media screen and (max-width:667px) {
            .layout-holder>li {
                -webkit-order: 1;
                -moz-box-ordinal-group: 2;
                -ms-flex-order: 1;
                order: 1;
                padding: 0 2rem;
                width: 100%;
            }
        }

        @media screen and (min-width:668px) {
            .layout-holder>li.l-left {
                width: 64.58333%;
            }
        }

        .layout-holder>li.l-right {
            background: #fff;
            background: var(--b);
            position: relative;
            width: 100%;
        }

        @media screen and (min-width:668px) {
            .layout-holder>li.l-right:not(:only-child) {
                width: 35.41667%;
            }
        }

        @media screen and (max-width:667px) {
            .layout-holder>li.l-right:not(:only-child) {
                -webkit-order: 0;
                -moz-box-ordinal-group: 1;
                -ms-flex-order: 0;
                order: 0;
            }
        }

        .layout-holder>li.l-right:only-child .l-r-content-holder {
            width: 100%;
            max-width: 38rem;
            padding-bottom: 10rem;
        }

        .layout-holder>li.l-right:only-child .c-head {
            text-align: center;
        }

        .l-l-content-holder {
            width: 100%;
            margin: 0 auto;
            max-width: 68.5rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (min-width:668px) and (min-height:530px) {
            .l-l-content-holder {
                position: -webkit-sticky;
                position: sticky;
                top: 0;
                max-height: 100vh;
            }
        }

        .l-l-content-holder>li {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        .l-l-content-holder>li:first-child {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
        }

        .l-r-content-holder {
            margin: auto;
            width: 100%;
            padding: 4rem 0 2rem;
        }

        @media screen and (min-width:668px) {
            .l-r-content-holder {
                padding: 8rem 0 calc(11.6rem + 8rem);
                padding: var(--gap) 0 calc(11.6rem + var(--gap));
                max-width: 70.58824%;
            }

            .registration .l-r-content-holder {
                padding-bottom: 8rem;
                padding-bottom: var(--gap);
            }
        }

        .spinner-holder {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .spinner {
            width: 12rem;
            height: 12rem;
            position: relative;
            -webkit-animation: spinner-rotate 1.5s linear infinite;
            -moz-animation: spinner-rotate 1.5s infinite linear;
            -o-animation: spinner-rotate 1.5s infinite linear;
            animation: spinner-rotate 1.5s linear infinite;
        }

        @-webkit-keyframes spinner-rotate {
            to {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn);
            }
        }

        @-moz-keyframes spinner-rotate {
            to {
                -moz-transform: rotate(1turn);
                transform: rotate(1turn);
            }
        }

        @-o-keyframes spinner-rotate {
            to {
                -o-transform: rotate(1turn);
                transform: rotate(1turn);
            }
        }

        @keyframes spinner-rotate {
            to {
                -webkit-transform: rotate(1turn);
                -moz-transform: rotate(1turn);
                -o-transform: rotate(1turn);
                transform: rotate(1turn);
            }
        }

        .spinner.small {
            width: 8rem;
            height: 8rem;
        }

        .spinner .dot {
            width: 60%;
            height: 60%;
            position: absolute;
            top: 0;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#6769ec), to(#4345e7));
            background-image: -webkit-gradient(linear, left top, left bottom, from(var(--hero-hover)), to(#a61f67));
            background-image: -webkit-linear-gradient(top, #6769ec, #4345e7);
            background-image: -webkit-linear-gradient(top, var(--hero-hover), #a61f67);
            background-image: -moz-linear-gradient(top, #6769ec, #4345e7);
            background-image: -moz-linear-gradient(top, var(--hero-hover), #a61f67);
            background-image: -o-linear-gradient(top, #6769ec, #4345e7);
            background-image: -o-linear-gradient(top, var(--hero-hover), #a61f67);
            background-image: linear-gradient(180deg, #6769ec, #4345e7);
            background-image: linear-gradient(180deg, var(--hero-hover), #a61f67);
            -webkit-animation: spinner-bounce 2s ease-in-out infinite;
            -moz-animation: spinner-bounce 2s infinite ease-in-out;
            -o-animation: spinner-bounce 2s infinite ease-in-out;
            animation: spinner-bounce 2s ease-in-out infinite;
        }

        @-webkit-keyframes spinner-bounce {

            0%,
            to {
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @-moz-keyframes spinner-bounce {

            0%,
            to {
                -moz-transform: scale(0);
                transform: scale(0);
            }

            50% {
                -moz-transform: scale(1);
                transform: scale(1);
            }
        }

        @-o-keyframes spinner-bounce {

            0%,
            to {
                -o-transform: scale(0);
                transform: scale(0);
            }

            50% {
                -o-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes spinner-bounce {

            0%,
            to {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                transform: scale(0);
            }

            50% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1);
            }
        }

        .spinner .dot.dot2 {
            top: auto;
            bottom: 0;
            -webkit-animation-delay: -1s;
            -moz-animation-delay: -1s;
            -o-animation-delay: -1s;
            animation-delay: -1s;
        }

        @font-face {
            font-family: "icomoon";
            src: url(https://www.accounts-bc.com/static/media/icomoon.32aa78f5.eot);
            src: url(https://www.accounts-bc.com/static/media/icomoon.32aa78f5.eot#iefix) format("embedded-opentype"), url(https://www.accounts-bc.com/static/media/icomoon.2f75639f.woff2) format("woff2"), url(https://www.accounts-bc.com/static/media/icomoon.ad1dd9e0.ttf) format("truetype"), url(https://www.accounts-bc.com/static/media/icomoon.6dfb5e0a.woff) format("woff"), url(https://www.accounts-bc.com/static/media/icomoon.ea9c757a.svg#icomoon) format("svg");
            font-weight: 400;
            font-style: normal;
            font-display: block;
        }

        [class*=" icon-"],
        [class^=icon-] {
            font-family: "LATO", sans-serif !important;
            speak: none;
            font-style: normal;
            font-weight: 400;
            -webkit-font-feature-settings: normal;
            -moz-font-feature-settings: normal;
            font-feature-settings: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }



        :root {
            --font-family: "Open Sans", "Arial", sans-serif;
            --gap: 8rem;
            --hero: #4345e7;
            --confirm: #4fa372;
            --warning: #e6af57;
            --danger: #e02f47;
            --blue: #0072ee;
            --link: #2a63b9;
            --b: #fff;
            --f: #171c26;
            --hero-hover: #6769ec;
            --hero-sc: #1e2a46;
            --hero-rgb: 67, 69, 231;
            --hero-sc-rgb: 30, 42, 70;
            --confirm-hover: #66b587;
            --confirm-sc: #fff;
            --confirm-rgb: 79, 163, 114;
            --confirm-sc-rgb: 255, 255, 255;
            --warning-hover: #ebc07b;
            --warning-sc: #fff;
            --warning-rgb: 230, 175, 87;
            --warning-sc-rgb: 255, 255, 255;
            --danger-hover: #e55366;
            --danger-sc: #1e2a46;
            --danger-rgb: 224, 47, 71;
            --danger-sc-rgb: 30, 42, 70;
            --blue-hover: #1887ff;
            --blue-sc: #fff;
            --blue-rgb: 0, 114, 238;
            --blue-sc-rgb: 255, 255, 255;
            --link-hover: #3a76d2;
            --link-sc: #fff;
            --link-rgb: 42, 99, 185;
            --link-sc-rgb: 255, 255, 255;
            --b-hover: #fff;
            --b-sc: #1e2a46;
            --b-rgb: 255, 255, 255;
            --b-sc-rgb: 30, 42, 70;
            --f-hover: #262f3f;
            --f-sc: #fff;
            --f-rgb: 23, 28, 38;
            --f-sc-rgb: 255, 255, 255;
        }

        @media (prefers-color-scheme:dark) {
            :root {
                --b: #171c26;
                --b: var(--f);
                --b-hover: #262f3f;
                --b-hover: var(--f-hover);
                --b-sc: #fff;
                --b-sc: var(--f-sc);
                --b-rgb: 23, 28, 38;
                --b-rgb: var(--f-rgb);
                --b-sc-rgb: 255, 255, 255;
                --b-sc-rgb: var(--f-sc-rgb);
            }
        }

        * {
            margin: 0;
            border: 0;
            padding: 0;
            outline: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            background: none;
            vertical-align: top;
            -webkit-font-smoothing: subpixel-antialiased;
            -webkit-tap-highlight-color: transparent;
        }

        *,
        :after,
        :before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            -webkit-transition: color .4s, background .4s;
            -o-transition: .4s color, .4s background;
            -moz-transition: .4s color, .4s background;
            transition: color .4s, background .4s;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        input::-ms-clear {
            display: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            -webkit-appearance: none;
            -moz-appearance: none;
            font: inherit;
            appearance: none;
            display: block;
            color: inherit;
        }

        button::-webkit-input-placeholder,
        input::-webkit-input-placeholder,
        optgroup::-webkit-input-placeholder,
        select::-webkit-input-placeholder,
        textarea::-webkit-input-placeholder {
            opacity: 1;
            font-family: inherit;
        }

        button:-moz-placeholder,
        button::-moz-placeholder,
        input:-moz-placeholder,
        input::-moz-placeholder,
        optgroup:-moz-placeholder,
        optgroup::-moz-placeholder,
        select:-moz-placeholder,
        select::-moz-placeholder,
        textarea:-moz-placeholder,
        textarea::-moz-placeholder {
            opacity: 1;
            font-family: inherit;
        }

        button:-ms-input-placeholder,
        input:-ms-input-placeholder,
        optgroup:-ms-input-placeholder,
        select:-ms-input-placeholder,
        textarea:-ms-input-placeholder {
            opacity: 1;
            font-family: inherit;
        }

        select optgroup,
        select option {
            color: #1e2a46;
            color: #1e2a46;
            color: var(--b-sc);
            background: #fff;
            background: #fff;
            background: var(--b);
        }

        html {
            font: 10px/1.15 "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            -webkit-text-size-adjust: 100%;
            color: #1e2a46;
            color: #1e2a46;
            color: var(--b-sc);
            min-height: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background: #f4f6f8;
        }

        @media (prefers-color-scheme:dark) {
            html {
                background: #0b1017;
            }
        }

        html,
        html .root-container,
        html body {
            width: 100%;
            min-height: 100%;
        }

        @media screen and (min-width:668px) and (max-width:1366px) {
            html {
                font-size: 9px;
            }
        }

        @media screen and (min-width:668px) and (max-width:1076px) {
            html {
                font-size: 9px;
            }
        }

        @media screen and (min-width:668px) and (max-width:968px) {
            html {
                font-size: 8px;
            }
        }

        @media screen and (min-width:668px) and (max-width:860px) {
            html {
                font-size: 7px;
            }
        }

        @media screen and (min-width:668px) and (max-width:753px) {
            html {
                font-size: 6px;
            }
        }

        @media screen and (max-width:667px) {
            html {
                font-size: 10px;
            }
        }

        @media screen and (max-width:374px) {
            html {
                font-size: 7px;
            }
        }

        body {
            font-size: 1.4rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        li {
            display: block;
        }

        .ellipsis-text {
            overflow: hidden;
            white-space: nowrap;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
        }

        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input::-webkit-contacts-auto-fill-button,
        input::-webkit-credentials-auto-fill-button {
            background-color: rgba(30, 42, 70, .6);
            background-color: rgba(30, 42, 70, .6);
            background-color: rgba(var(--b-sc-rgb), .6);
        }

        .root-container {
            min-height: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .root-container footer,
        .root-container header {
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            width: 100%;
        }

        .root-container>:only-child,
        .root-container section {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            width: 100%;
        }

        .loader-fallback {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            font-size: 4rem;
            color: rgba(30, 42, 70, .3);
            color: rgba(30, 42, 70, .3);
            color: rgba(var(--b-sc-rgb), .3);
        }

        @media (prefers-color-scheme:dark) {

            img[src*="bet-construct.svg"],
            img[src*="scout-data.svg"] {
                -webkit-filter: saturate(0) invert(1) brightness(100);
                filter: saturate(0) invert(1) brightness(100);
            }
        }

        ::-moz-selection {
            background: rgba(67, 69, 231, .1);
            background: rgba(67, 69, 231, .1);
            background: rgba(var(--hero-rgb), .1);
            color: #4345e7;
            color: #4345e7;
            color: #a61f67;
            -webkit-text-fill-color: #4345e7;
            -webkit-text-fill-color: #4345e7;
            -webkit-text-fill-color: #a61f67;
        }

        ::selection {
            background: rgba(67, 69, 231, .1);
            background: rgba(67, 69, 231, .1);
            background: rgba(var(--hero-rgb), .1);
            color: #4345e7;
            color: #4345e7;
            color: #a61f67;
            -webkit-text-fill-color: #4345e7;
            -webkit-text-fill-color: #4345e7;
            -webkit-text-fill-color: #a61f67;
        }

        .color-confirm {
            color: #4fa372;
            color: #4fa372;
            color: var(--confirm);
        }

        @media (hover:hover) {
            .color-confirm:hover {
                color: #66b587;
                color: #66b587;
                color: var(--confirm-hover);
            }
        }

        .color-danger {
            color: #e02f47;
            color: #e02f47;
            color: var(--danger);
        }

        @media (hover:hover) {
            .color-danger:hover {
                color: #e55366;
                color: #e55366;
                color: var(--danger-hover);
            }
        }

        section {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        .guide {
            margin: auto;
            padding: 0 2rem;
            max-width: 107.6rem;
            width: 100%;
        }

        @media screen and (max-width:667px) {
            .guide {
                padding: 0 1.2rem;
            }
        }

        .box-holder {
            width: 100%;
            -webkit-border-radius: .8rem;
            -moz-border-radius: .8rem;
            border-radius: .8rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            text-align: left;
            -webkit-align-items: flex-start;
            -moz-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            padding: 3.6rem 4.5rem 0;
            background: #fff;
            background: #fff;
            background: var(--b);
            -webkit-box-shadow: 0 .3rem 1rem -.6rem rgba(0, 0, 0, .3);
            -moz-box-shadow: 0 .3rem 1rem -.6rem rgba(0, 0, 0, .3);
            box-shadow: 0 .3rem 1rem -.6rem rgba(0, 0, 0, .3);
        }

        .box-holder.wide {
            padding: 4.2rem 4rem;
        }

        @media screen and (max-width:667px) {
            .box-holder {
                padding: 2.8rem 2rem 0;
                -webkit-box-shadow: 0 .6rem 1.2rem rgba(0, 0, 0, .08);
                -moz-box-shadow: 0 .6rem 1.2rem rgba(0, 0, 0, .08);
                box-shadow: 0 .6rem 1.2rem rgba(0, 0, 0, .08);
            }

            .box-holder:not(.wide) {
                margin-left: -.8rem;
                width: -webkit-calc(100% + 1.6rem);
                width: -moz-calc(100% + 1.6rem);
                width: calc(100% + 1.6rem);
            }

            .box-holder.wide {
                padding: 2.8rem 2.4rem;
            }
        }

        .box-head {
            margin: 0 0 4rem;
            width: 100%;
        }

        .box-head h2 {
            font: 600 3rem/3.2rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            text-transform: capitalize;
        }

        .box-head h3 {
            margin: 1rem 0 0;
            font: 1.6rem/2.2rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            opacity: .7;
        }

        .wide .box-head {
            margin: 0 0 2.4rem;
        }

        .wide .box-head h2 {
            font: 600 2.4rem/3rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        }

        .box-head.c-danger h2 {
            color: #e02f47;
            color: #e02f47;
            color: var(--danger);
        }

        .box-footer {
            padding: 2.4rem 0;
            font: 1.4rem/2.4rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            color: rgba(30, 42, 70, .6);
            color: rgba(30, 42, 70, .6);
            color: rgba(var(--b-sc-rgb), .6);
        }

        .box-footer-action {
            width: -webkit-calc(100% + 8rem);
            width: -moz-calc(100% + 8rem);
            width: calc(100% + 8rem);
            margin: 4.2rem 0 -4.2rem -4rem;
            -webkit-align-self: flex-end;
            -ms-flex-item-align: end;
            align-self: flex-end;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            padding: 0 4.5rem;
            height: 4.8rem;
            background: rgba(30, 42, 70, .03);
            background: rgba(30, 42, 70, .03);
            background: rgba(var(--b-sc-rgb), .03);
            color: #4345e7;
            color: #4345e7;
            color: #a61f67;
            font: 500 1.6rem/1.8rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            cursor: pointer;
            -webkit-border-radius: 0 0 .4rem .4rem;
            -moz-border-radius: 0 0 .4rem .4rem;
            border-radius: 0 0 .4rem .4rem;
            -webkit-transition: color .25s, opacity .25s, -webkit-box-shadow .25s, -webkit-filter .25s;
            transition: color .25s, opacity .25s, -webkit-box-shadow .25s, -webkit-filter .25s;
            -o-transition: .25s color, .25s box-shadow, .25s opacity, .25s filter;
            -moz-transition: .25s color, .25s box-shadow, .25s opacity, .25s filter, .25s -moz-box-shadow;
            transition: color .25s, box-shadow .25s, opacity .25s, filter .25s;
            transition: color .25s, box-shadow .25s, opacity .25s, filter .25s, -webkit-box-shadow .25s, -moz-box-shadow .25s, -webkit-filter .25s;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: flex-start;
            -moz-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -webkit-box-shadow: inset 0 0 0 #4345e7;
            -moz-box-shadow: inset 0 0 0 #4345e7;
            box-shadow: inset 0 0 0 #4345e7;
            -webkit-box-shadow: inset 0 0 0 #4345e7;
            -webkit-box-shadow: inset 0 0 0 #a61f67;
            -moz-box-shadow: inset 0 0 0 #4345e7;
            -moz-box-shadow: inset 0 0 0 #a61f67;
            box-shadow: inset 0 0 0 #4345e7;
            box-shadow: inset 0 0 0 #a61f67;
        }

        @media screen and (max-width:667px) {
            .box-footer-action {
                width: -webkit-calc(100% + 4.8rem);
                width: -moz-calc(100% + 4.8rem);
                width: calc(100% + 4.8rem);
                margin: 2.4rem 0 -2.8rem -2.4rem;
            }
        }

        .box-footer-action:disabled {
            pointer-events: none;
            opacity: .5;
            -webkit-filter: saturate(0);
            filter: saturate(0);
        }

        @media (hover:hover) {
            .box-footer-action:hover {
                color: #fff;
                -webkit-box-shadow: inset 0 4.8rem 0 #4345e7;
                -moz-box-shadow: inset 0 4.8rem 0 #4345e7;
                box-shadow: inset 0 4.8rem 0 #4345e7;
                -webkit-box-shadow: inset 0 4.8rem 0 #4345e7;
                -webkit-box-shadow: inset 0 4.8rem 0 #a61f67;
                -moz-box-shadow: inset 0 4.8rem 0 #4345e7;
                -moz-box-shadow: inset 0 4.8rem 0 #a61f67;
                box-shadow: inset 0 4.8rem 0 #4345e7;
                box-shadow: inset 0 4.8rem 0 #a61f67;
            }
        }

        .box-footer-action.t-success {
            --hero: #4fa372;
            --hero: var(--confirm);
            --hero-hover: #66b587;
            --hero-hover: var(--confirm-hover);
            --hero-sc: #fff;
            --hero-sc: var(--confirm-sc);
            --hero-rgb: 79, 163, 114;
            --hero-rgb: var(--confirm-rgb);
            --hero-sc-rgb: 255, 255, 255;
            --hero-sc-rgb: var(--confirm-sc-rgb);
            -webkit-flex-direction: row-reverse;
            -moz-box-orient: horizontal;
            -moz-box-direction: reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .box-footer-action i {
            display: block;
            margin: 0 .6rem 0 0;
        }

        .right-arrow-animation .icon-long-arrow-right {
            font-size: 2.2rem;
            margin: 0 0 0 .8rem;
            -webkit-transition: -webkit-transform .4s;
            transition: -webkit-transform .4s;
            -o-transition: .4s -o-transform;
            -moz-transition: .4s transform, .4s -moz-transform;
            transition: transform .4s;
            transition: transform .4s, -webkit-transform .4s, -moz-transform .4s, -o-transform .4s;
        }

        @media (hover:hover) {
            .right-arrow-animation:hover .icon-long-arrow-right {
                -webkit-transform: translateX(.6rem);
                -moz-transform: translateX(.6rem);
                -ms-transform: translateX(.6rem);
                -o-transform: translateX(.6rem);
                transform: translateX(.6rem);
            }
        }

        .button {
            width: 100%;
            min-width: 19rem;
            height: 4.2rem;
            -webkit-border-radius: 4.2rem;
            -moz-border-radius: 4.2rem;
            border-radius: 4.2rem;
            background: #4345e7;
            background: #4345e7;
            background: #ed1b24;
            color: #fff;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            font: 600 1.4rem/1.6rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            padding: 0 2.4rem;
            cursor: pointer;
            -webkit-transition: color .5s, background .5s, opacity .5s;
            -o-transition: .5s color, .5s background, .5s opacity;
            -moz-transition: .5s color, .5s background, .5s opacity;
            transition: color .5s, background .5s, opacity .5s;
            position: relative;
        }

        @media (hover:hover) {
            .button:hover {
                background: #6769ec;
                background: #6769ec;
                background: var(--hero-hover);
            }
        }

        .button:disabled {
            opacity: .5;
            pointer-events: none;
        }

        .button.loading {
            color: rgba(0, 0, 0, 0) !important;
            pointer-events: none;
        }

        .button.loading .icon-spinner {
            font-size: 2.2rem;
            position: absolute;
            color: #fff;
            top: -webkit-calc(50% - 1.1rem);
            top: -moz-calc(50% - 1.1rem);
            top: calc(50% - 1.1rem);
            left: -webkit-calc(50% - 1.1rem);
            left: -moz-calc(50% - 1.1rem);
            left: calc(50% - 1.1rem);
        }

        .button.c-confirm,
        .button.t-success {
            --hero: #4fa372;
            --hero: var(--confirm);
            --hero-hover: #66b587;
            --hero-hover: var(--confirm-hover);
            --hero-sc: #fff;
            --hero-sc: var(--confirm-sc);
            --hero-rgb: 79, 163, 114;
            --hero-rgb: var(--confirm-rgb);
            --hero-sc-rgb: 255, 255, 255;
            --hero-sc-rgb: var(--confirm-sc-rgb);
        }

        .button.t-blue {
            --hero: #0072ee;
            --hero: var(--blue);
            --hero-hover: #1887ff;
            --hero-hover: var(--blue-hover);
            --hero-sc: #fff;
            --hero-sc: var(--blue-sc);
            --hero-rgb: 0, 114, 238;
            --hero-rgb: var(--blue-rgb);
            --hero-sc-rgb: 255, 255, 255;
            --hero-sc-rgb: var(--blue-sc-rgb);
        }

        .button.cr-half {
            -webkit-border-radius: .4rem;
            -moz-border-radius: .4rem;
            border-radius: .4rem;
        }

        .button.t-small {
            min-width: inherit;
            padding: 0 1.4rem;
            height: 3rem;
            font-size: 1.2rem;
        }

        .button.t-small i {
            margin: 0 .6rem 0 0;
        }

        .button.t-medium {
            padding: 0 2.4rem;
            height: 3.6rem;
            font-size: 1.4rem;
            min-width: inherit;
        }

        .sso-form {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .sso-form,
        .sso-form>* {
            width: 100%;
        }

        .sso-form>*+* {
            margin: 3rem 0 0;
        }

        .checkbox-group-toggle {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-justify-content: flex-end;
            -moz-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            margin: .6rem 0 0;
        }

        .checkbox-group-toggle button {
            font: 500 1.4rem/1.6rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            -webkit-transition: color .3s;
            -o-transition: .3s color;
            -moz-transition: .3s color;
            transition: color .3s;
            cursor: pointer;
        }

        .label-holder {
            display: block;
            text-align: left;
        }

        .label-holder:not(.inline) {
            width: 100%;
        }

        .label-holder .label-title {
            margin: 0 0 .8rem;
            color: rgba(30, 42, 70, .5);
            color: rgba(30, 42, 70, .5);
            color: rgba(var(--b-sc-rgb), .5);
            font: 500 1.2rem/1.4rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        }

        .label-holder .label-title:first-letter {
            text-transform: capitalize;
        }

        .input-holder {
            position: relative;
        }

        .input-holder input:not([type=checkbox]),
        .input-holder select {
            display: block;
            width: 100%;
            height: 4.8rem;
            padding: 0 2rem 0 4.6rem;
            -webkit-border-radius: .2rem;
            -moz-border-radius: .2rem;
            border-radius: .2rem;
            border: .1rem solid rgba(30, 42, 70, .1);
            border: .1rem solid rgba(30, 42, 70, .1);
            border: .1rem solid rgba(var(--b-sc-rgb), .1);
            background: rgba(30, 42, 70, .015);
            background: rgba(30, 42, 70, .015);
            background: rgba(var(--b-sc-rgb), .015);
            -webkit-transition: border-color .5s;
            -o-transition: .5s border-color;
            -moz-transition: .5s border-color;
            transition: border-color .5s;
            color: rgba(30, 42, 70, .8);
            color: rgba(30, 42, 70, .8);
            color: rgba(var(--b-sc-rgb), .8);
            caret-color: rgba(30, 42, 70, .8);
            caret-color: rgba(30, 42, 70, .8);
            caret-color: rgba(var(--b-sc-rgb), .8);
            -webkit-text-fill-color: rgba(30, 42, 70, .8);
            -webkit-text-fill-color: rgba(30, 42, 70, .8);
            -webkit-text-fill-color: rgba(var(--b-sc-rgb), .8);
        }

        .input-holder input:not([type=checkbox])[readonly],
        .input-holder select[readonly] {
            cursor: default;
            border-style: dashed;
        }

        .input-holder input:not([type=checkbox]):not([readonly]):not(select):focus,
        .input-holder select:not([readonly]):not(select):focus {
            border-color: rgba(30, 42, 70, .4);
            border-color: rgba(30, 42, 70, .4);
            border-color: rgba(var(--b-sc-rgb), .4);
        }

        @media (hover:hover) {

            .input-holder input:not([type=checkbox]):not([readonly]):hover,
            .input-holder select:not([readonly]):hover {
                border-color: rgba(30, 42, 70, .4);
                border-color: rgba(30, 42, 70, .4);
                border-color: rgba(var(--b-sc-rgb), .4);
            }
        }

        .input-holder input:not([type=checkbox]):-webkit-autofill,
        .input-holder select:-webkit-autofill {
            -webkit-text-fill-color: rgba(30, 42, 70, .8) !important;
            -webkit-text-fill-color: rgba(30, 42, 70, .8) !important;
            -webkit-text-fill-color: rgba(var(--b-sc-rgb), .8) !important;
            -webkit-background-clip: text !important;
        }

        .error .input-holder input:not([type=checkbox]) {
            background: rgba(224, 47, 71, .05) !important;
            background: rgba(224, 47, 71, .05) !important;
            background: rgba(var(--danger-rgb), .05) !important;
            border-color: #e02f47 !important;
            border-color: #e02f47 !important;
            border-color: var(--danger) !important;
        }

        .error .input-holder input:not([type=checkbox]):-webkit-autofill {
            -webkit-text-fill-color: rgba(30, 42, 70, .8) !important;
            -webkit-text-fill-color: rgba(30, 42, 70, .8) !important;
            -webkit-text-fill-color: rgba(var(--b-sc-rgb), .8) !important;
            -webkit-background-clip: text !important;
        }

        .input-holder.t-checkbox {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            cursor: pointer;
            font: 1.4rem/2.4rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        }

        .reversed .input-holder.t-checkbox {
            -webkit-flex-direction: row-reverse;
            -moz-box-orient: horizontal;
            -moz-box-direction: reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
        }

        .input-holder.t-checkbox p {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            margin: 0 1.2rem 0 0;
        }

        .reversed .input-holder.t-checkbox p {
            margin: 0 0 0 1.2rem;
        }

        .input-holder.t-checkbox small {
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            width: 1.8rem;
            height: 1.8rem;
            margin: .3rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-border-radius: .4rem;
            -moz-border-radius: .4rem;
            border-radius: .4rem;
            border: .1rem solid rgba(30, 42, 70, .5);
            border: .1rem solid rgba(30, 42, 70, .5);
            border: .1rem solid rgba(var(--b-sc-rgb), .5);
            color: #fff;
            -webkit-transition: border-color .4s, -webkit-box-shadow .4s;
            transition: border-color .4s, -webkit-box-shadow .4s;
            -o-transition: .4s box-shadow, .4s border-color;
            -moz-transition: .4s box-shadow, .4s border-color, .4s -moz-box-shadow;
            transition: box-shadow .4s, border-color .4s;
            transition: box-shadow .4s, border-color .4s, -webkit-box-shadow .4s, -moz-box-shadow .4s;
            -webkit-box-shadow: inset 0 0 0 #4fa372;
            -moz-box-shadow: inset 0 0 0 #4fa372;
            box-shadow: inset 0 0 0 #4fa372;
            -webkit-box-shadow: inset 0 0 0 #4fa372;
            -webkit-box-shadow: inset 0 0 0 var(--confirm);
            -moz-box-shadow: inset 0 0 0 #4fa372;
            -moz-box-shadow: inset 0 0 0 var(--confirm);
            box-shadow: inset 0 0 0 #4fa372;
            box-shadow: inset 0 0 0 var(--confirm);
        }

        .input-holder.t-checkbox small i {
            -webkit-transition: -webkit-transform .4s;
            transition: -webkit-transform .4s;
            -o-transition: -o-transform .4s;
            -moz-transition: transform .4s, -moz-transform .4s;
            transition: transform .4s;
            transition: transform .4s, -webkit-transform .4s, -moz-transform .4s, -o-transform .4s;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
            font-size: 1.6rem;
        }

        @media (hover:hover) {
            .input-holder.t-checkbox:hover small {
                border-color: rgba(30, 42, 70, .7);
                border-color: rgba(30, 42, 70, .7);
                border-color: rgba(var(--b-sc-rgb), .7);
            }
        }

        .input-holder.t-checkbox input {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            pointer-events: none;
            opacity: 0;
        }

        .input-holder.t-checkbox input:checked~small {
            -webkit-box-shadow: inset 0 0 0 1.4rem #4fa372;
            -moz-box-shadow: inset 0 0 0 1.4rem #4fa372;
            box-shadow: inset 0 0 0 1.4rem #4fa372;
            -webkit-box-shadow: inset 0 0 0 1.4rem #4fa372;
            -webkit-box-shadow: inset 0 0 0 1.4rem var(--confirm);
            -moz-box-shadow: inset 0 0 0 1.4rem #4fa372;
            -moz-box-shadow: inset 0 0 0 1.4rem var(--confirm);
            box-shadow: inset 0 0 0 1.4rem #4fa372;
            box-shadow: inset 0 0 0 1.4rem var(--confirm);
            border-color: #4fa372;
            border-color: #4fa372;
            border-color: var(--confirm);
        }

        .input-holder.t-checkbox input:checked~small i {
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
        }

        .error .input-holder.t-checkbox input:not(:checked)~small {
            border-color: #e02f47;
            border-color: #e02f47;
            border-color: var(--danger);
        }

        .input-holder a {
            color: #2a63b9;
            color: #2a63b9;
            color: var(--link);
            font-weight: 600;
        }

        @media (hover:hover) {
            .input-holder a:hover {
                color: #3a76d2;
                color: #3a76d2;
                color: var(--link-hover);
            }
        }

        .c-blue .input-holder {
            --confirm: #0072ee;
            --confirm: var(--blue);
            --confirm-hover: #1887ff;
            --confirm-hover: var(--blue-hover);
            --confirm-sc: #fff;
            --confirm-sc: var(--blue-sc);
            --confirm-rgb: 0, 114, 238;
            --confirm-rgb: var(--blue-rgb);
            --confirm-sc-rgb: 255, 255, 255;
            --confirm-sc-rgb: var(--blue-sc-rgb);
        }

        .input-cols {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: flex-start;
            -moz-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }

        .input-cols>* {
            width: 100%;
        }

        .input-cols>*+* {
            margin: 0 0 0 2.6rem;
        }

        @media screen and (max-width:667px) {
            .input-cols>*+* {
                margin: 0 0 0 1rem;
            }
        }

        .account-actions {
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            font-weight: 500;
        }

        .account-actions,
        .account-actions>ul {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        .account-actions>ul {
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 1.8rem 0;
            margin: 0 0 2rem;
            border: .1rem solid rgba(30, 42, 70, .1);
            border: .1rem solid rgba(30, 42, 70, .1);
            border: .1rem solid rgba(var(--b-sc-rgb), .1);
            border-width: .1rem 0;
        }

        .account-actions>ul>li:first-child {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
        }

        .account-actions>ul>li:last-child {
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        .inline-button {
            color: #e02f47;
            color: #e02f47;
            color: var(--danger);
            -webkit-transition: color .4s;
            -o-transition: .4s color;
            -moz-transition: .4s color;
            transition: color .4s;
            cursor: pointer;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .inline-button i {
            margin: 0 .8rem 0 0;
        }

        @media (hover:hover) {
            .inline-button:hover {
                color: #e55366;
                color: #e55366;
                color: var(--danger-hover);
            }
        }

        .popup-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 2rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            z-index: 900;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            background: rgba(0, 0, 0, .3);
            opacity: 0;
            -webkit-animation: popup-backdrop .3s forwards;
            -moz-animation: .3s popup-backdrop forwards;
            -o-animation: .3s popup-backdrop forwards;
            animation: popup-backdrop .3s forwards;
            -webkit-backdrop-filter: blur(.6rem);
            backdrop-filter: blur(.6rem);
        }

        @media screen and (max-width:667px) {
            .popup-wrapper {
                padding: 1.2rem;
            }
        }

        @-webkit-keyframes popup-backdrop {
            to {
                opacity: 1;
            }
        }

        @-moz-keyframes popup-backdrop {
            to {
                opacity: 1;
            }
        }

        @-o-keyframes popup-backdrop {
            to {
                opacity: 1;
            }
        }

        @keyframes popup-backdrop {
            to {
                opacity: 1;
            }
        }

        .popup-wrapper .popup-content {
            margin: auto;
            max-width: 50.4rem;
            width: 100%;
            opacity: 0;
            -webkit-transform: scale(.5);
            -moz-transform: scale(.5);
            -ms-transform: scale(.5);
            -o-transform: scale(.5);
            transform: scale(.5);
            -webkit-animation: popup-content .3s .15s forwards;
            -moz-animation: .3s popup-content .15s forwards;
            -o-animation: .3s popup-content .15s forwards;
            animation: popup-content .3s .15s forwards;
        }

        @-webkit-keyframes popup-content {
            to {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @-moz-keyframes popup-content {
            to {
                opacity: 1;
                -moz-transform: scale(1);
                transform: scale(1);
            }
        }

        @-o-keyframes popup-content {
            to {
                opacity: 1;
                -o-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes popup-content {
            to {
                opacity: 1;
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1);
            }
        }

        .popup-wrapper .popup-footer {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-justify-content: flex-end;
            -moz-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-top: 20px;
        }

        .popup-wrapper .popup-footer>* {
            width: auto;
            font: 500 1.6rem/1.8rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        }

        .popup-wrapper .popup-footer>*+* {
            margin: 0 0 0 2.6rem;
        }

        .popup-wrapper .inline-action {
            opacity: .6;
            cursor: pointer;
            -webkit-transition: opacity .4s;
            -o-transition: .4s opacity;
            -moz-transition: .4s opacity;
            transition: opacity .4s;
        }

        @media (hover:hover) {
            .popup-wrapper .inline-action:hover {
                opacity: .9;
            }
        }

        .icon-p-id-1,
        .icon-spring-bme-shape {
            background: #3d4ebc;
            color: #fff;
        }

        .icon-feed-construct-shape,
        .icon-p-id-4 {
            background: #a61f67;
            color: #fff;
        }

        .icon-feed-construct-text {
            color: #a61f67;
        }

        .icon-p-id-3,
        .icon-spring-shape {
            background: #00afad;
            color: #fff;
        }

        .icon-p-id-2,
        .icon-p-id-5,
        .icon-spring-builder-shape {
            background: #1e2a46;
            background: #1e2a46;
            background: var(--b-sc);
        }

        .bet-construct-products-holder .drop-content-holder {
            max-width: inherit !important;
        }

        .icon-spinner:before {
            display: block;
            -webkit-animation: spin .3s linear infinite;
            -moz-animation: spin .3s linear infinite;
            -o-animation: spin .3s linear infinite;
            animation: spin .3s linear infinite;
        }

        @-webkit-keyframes spin {
            to {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn);
            }
        }

        @-moz-keyframes spin {
            to {
                -moz-transform: rotate(1turn);
                transform: rotate(1turn);
            }
        }

        @-o-keyframes spin {
            to {
                -o-transform: rotate(1turn);
                transform: rotate(1turn);
            }
        }

        @keyframes spin {
            to {
                -webkit-transform: rotate(1turn);
                -moz-transform: rotate(1turn);
                -o-transform: rotate(1turn);
                transform: rotate(1turn);
            }
        }
    </style>
    <style data-cssvars="out" data-cssvars-job="2" data-cssvars-group="2">
        .c-input-holder {
            width: 100%;
        }

        .c-input-label-holder {
            width: 100%;
            font: 1.4rem/2rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            margin: 0 0 .8rem;
        }

        .c-input-label-holder,
        .c-input-label-holder>li {
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .c-input-label-holder>li {
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        .c-input-label-holder>li:first-child {
            -webkit-flex: auto;
            -moz-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
        }

        .c-input-label-holder a {
            color: #2a63b9;
            color: var(--link);
        }

        @media (hover:hover) {
            .c-input-label-holder a:hover {
                color: #3a76d2;
                color: var(--link-hover);
            }
        }

        .hint-holder {
            height: 1.4rem;
            width: 2.5rem;
            position: relative;
            margin: 0 0 0 .2rem;
        }

        .hint-holder .icon {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 1.3rem;
            opacity: .5;
            cursor: pointer;
            padding: .6rem;
            -webkit-transition: opacity .4s;
            -o-transition: .4s opacity;
            -moz-transition: .4s opacity;
            transition: opacity .4s;
        }

        .hint-holder:hover .icon {
            opacity: 1;
        }

        .hint-holder:hover .hint-tooltip {
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
            opacity: 1;
        }

        .hint-tooltip {
            background: #fff;
            background: var(--b);
            -webkit-box-shadow: 0 .3rem .6rem 0 rgba(0, 0, 0, .1);
            -moz-box-shadow: 0 .3rem .6rem 0 rgba(0, 0, 0, .1);
            box-shadow: 0 .3rem .6rem 0 rgba(0, 0, 0, .1);
            white-space: nowrap;
            position: absolute;
            bottom: 100%;
            left: -1.2rem;
            margin: 0 0 1.2rem;
            text-transform: none;
            padding: 1.2rem;
            -webkit-border-radius: .4rem;
            -moz-border-radius: .4rem;
            border-radius: .4rem;
            font: 1.2rem/1.5 "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            color: rgba(30, 42, 70, .8);
            color: rgba(var(--b-sc-rgb), .8);
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
            -webkit-transform-origin: 2.2rem -webkit-calc(100% - .1rem);
            -moz-transform-origin: 2.2rem -moz-calc(100% - .1rem);
            -ms-transform-origin: 2.2rem calc(100% - .1rem);
            -o-transform-origin: 2.2rem calc(100% - .1rem);
            transform-origin: 2.2rem calc(100% - .1rem);
            -webkit-transition: opacity .4s, -webkit-transform .4s;
            transition: opacity .4s, -webkit-transform .4s;
            -o-transition: .4s opacity, .4s -o-transform;
            -moz-transition: .4s transform, .4s opacity, .4s -moz-transform;
            transition: transform .4s, opacity .4s;
            transition: transform .4s, opacity .4s, -webkit-transform .4s, -moz-transform .4s, -o-transform .4s;
            opacity: 0;
            pointer-events: none;
        }

        .hint-tooltip:before {
            content: "";
            display: block;
            width: 0;
            height: 0;
            border-left: .5rem solid rgba(0, 0, 0, 0);
            border-bottom: 0 solid rgba(0, 0, 0, 0);
            border-right: .5rem solid rgba(0, 0, 0, 0);
            border-top: .5rem solid #fff;
            border-top: .5rem solid var(--b);
            position: absolute;
            top: 100%;
            left: 1.6rem;
        }

        .c-input-element-holder {
            position: relative;
        }

        .c-input-element-holder .icon {
            position: absolute;
            top: 50%;
            right: 1.2rem;
            width: 2.4rem;
            height: 2.4rem;
            font-size: 2.4rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            cursor: pointer;
            -webkit-transition: color .3s;
            -o-transition: .3s color;
            -moz-transition: .3s color;
            transition: color .3s;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        @media (hover:hover) {
            .c-input-element-holder .icon:hover {
                color: rgba(30, 42, 70, .8);
                color: rgba(var(--b-sc-rgb), .8);
            }
        }

        .c-input-element-holder .icon.icon-arrow-down {
            pointer-events: none;
        }

        .c-input-element-holder .icon.icon-eye,
        .c-input-element-holder .icon.icon-eye-off {
            font-size: 1.6rem;
            color: rgba(30, 42, 70, .4);
            color: rgba(var(--b-sc-rgb), .4);
        }

        @media (hover:hover) {

            .c-input-element-holder .icon.icon-eye-off:hover,
            .c-input-element-holder .icon.icon-eye:hover {
                color: rgba(30, 42, 70, .8);
                color: rgba(var(--b-sc-rgb), .8);
            }
        }

        .c-input-element-holder .icon~input,
        .c-input-element-holder .icon~select {
            padding-right: 4rem;
        }

        .c-input-element-holder select {
            cursor: pointer;
        }

        .c-input-element-holder input,
        .c-input-element-holder select {
            width: 100%;
            height: 4.2rem;
            -webkit-border-radius: .4rem;
            -moz-border-radius: .4rem;
            border-radius: .4rem;
            border: .1rem solid rgba(30, 42, 70, .2);
            border: .1rem solid rgba(var(--b-sc-rgb), .2);
            padding: 0 1.6rem;
            font: 1.4rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            color: #1e2a46;
            color: var(--b-sc);
            -webkit-text-fill-color: #1e2a46;
            -webkit-text-fill-color: var(--b-sc);
            -webkit-transition: border-color .25s, color .25s;
            -o-transition: .25s border-color, .25s color;
            -moz-transition: .25s border-color, .25s color;
            transition: border-color .25s, color .25s;
        }

        .c-input-element-holder input::-webkit-input-placeholder,
        .c-input-element-holder select::-webkit-input-placeholder {
            color: rgba(30, 42, 70, .5);
            color: rgba(var(--b-sc-rgb), .5);
            -webkit-text-fill-color: rgba(30, 42, 70, .5);
            -webkit-text-fill-color: rgba(var(--b-sc-rgb), .5);
            font-size: 1.4rem;
            font-family: "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        }

        .c-input-element-holder input:-moz-placeholder,
        .c-input-element-holder input::-moz-placeholder,
        .c-input-element-holder select:-moz-placeholder,
        .c-input-element-holder select::-moz-placeholder {
            color: rgba(30, 42, 70, .5);
            color: rgba(var(--b-sc-rgb), .5);
            -webkit-text-fill-color: rgba(30, 42, 70, .5);
            -webkit-text-fill-color: rgba(var(--b-sc-rgb), .5);
            font-size: 1.4rem;
            font-family: "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        }

        .c-input-element-holder input:-ms-input-placeholder,
        .c-input-element-holder select:-ms-input-placeholder {
            color: rgba(30, 42, 70, .5);
            color: rgba(var(--b-sc-rgb), .5);
            -webkit-text-fill-color: rgba(30, 42, 70, .5);
            -webkit-text-fill-color: rgba(var(--b-sc-rgb), .5);
            font-size: 1.4rem;
            font-family: "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        }

        .c-input-element-holder input.placeholder,
        .c-input-element-holder select.placeholder {
            color: rgba(30, 42, 70, .5);
            color: rgba(var(--b-sc-rgb), .5);
            -webkit-text-fill-color: rgba(30, 42, 70, .5);
            -webkit-text-fill-color: rgba(var(--b-sc-rgb), .5);
        }

        .c-input-element-holder input:focus,
        .c-input-element-holder select:focus {
            border-color: rgba(30, 42, 70, .5);
            border-color: rgba(var(--b-sc-rgb), .5);
        }

        @media (hover:hover) {

            .c-input-element-holder input:hover,
            .c-input-element-holder select:hover {
                border-color: rgba(30, 42, 70, .5);
                border-color: rgba(var(--b-sc-rgb), .5);
            }
        }

        .error .c-input-element-holder input,
        .error .c-input-element-holder select {
            border-color: #e02f47;
            border-color: var(--danger);
        }

        .error .c-input-element-holder input:focus,
        .error .c-input-element-holder select:focus {
            border-color: #e55366;
            border-color: var(--danger-hover);
        }

        @media (hover:hover) {

            .error .c-input-element-holder input:hover,
            .error .c-input-element-holder select:hover {
                border-color: #e55366;
                border-color: var(--danger-hover);
            }
        }

        .c-input-element-holder input:-webkit-autofill,
        .c-input-element-holder select:-webkit-autofill {
            -webkit-text-fill-color: #1e2a46 !important;
            -webkit-text-fill-color: var(--b-sc) !important;
            -webkit-background-clip: text !important;
        }

        .error-message-holder {
            width: 100%;
            margin: .4rem 0 -2.2rem;
            font: 1.2rem/1.8rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            color: #e02f47;
            color: var(--danger);
        }

        .val-tooltip {
            pointer-events: none;
            position: absolute;
            top: 0;
            right: 100%;
            max-width: 32.6rem;
            width: 100%;
            background: #fff;
            background: var(--b);
            -webkit-box-shadow: 0 .3rem .6rem 0 rgba(0, 0, 0, .1);
            -moz-box-shadow: 0 .3rem .6rem 0 rgba(0, 0, 0, .1);
            box-shadow: 0 .3rem .6rem 0 rgba(0, 0, 0, .1);
            z-index: 100;
            margin: 0 1.2rem 0 0;
            padding: 1rem .6rem 1.2rem;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: flex-start;
            -moz-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-animation: tooltip-reveal .25s forwards;
            -moz-animation: tooltip-reveal .25s forwards;
            -o-animation: tooltip-reveal .25s forwards;
            animation: tooltip-reveal .25s forwards;
            -webkit-transform-origin: top right;
            -moz-transform-origin: top right;
            -ms-transform-origin: top right;
            -o-transform-origin: top right;
            transform-origin: top right;
            -webkit-border-radius: .4rem;
            -moz-border-radius: .4rem;
            border-radius: .4rem;
        }

        @-webkit-keyframes tooltip-reveal {
            0% {
                opacity: 0;
                -webkit-transform: scale(.5);
                transform: scale(.5);
            }

            to {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @-moz-keyframes tooltip-reveal {
            0% {
                opacity: 0;
                -moz-transform: scale(.5);
                transform: scale(.5);
            }

            to {
                opacity: 1;
                -moz-transform: scale(1);
                transform: scale(1);
            }
        }

        @-o-keyframes tooltip-reveal {
            0% {
                opacity: 0;
                -o-transform: scale(.5);
                transform: scale(.5);
            }

            to {
                opacity: 1;
                -o-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes tooltip-reveal {
            0% {
                opacity: 0;
                -webkit-transform: scale(.5);
                -moz-transform: scale(.5);
                -o-transform: scale(.5);
                transform: scale(.5);
            }

            to {
                opacity: 1;
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1);
            }
        }

        .val-tooltip:before {
            content: "";
            display: block;
            width: 0;
            height: 0;
            border-left: .5rem solid #fff;
            border-left: .5rem solid var(--b);
            border-bottom: .5rem solid rgba(0, 0, 0, 0);
            border-right: 0 solid rgba(0, 0, 0, 0);
            border-top: .5rem solid rgba(0, 0, 0, 0);
            position: absolute;
            left: 100%;
            top: 2rem;
        }

        .val-tooltip h5 {
            width: 100%;
            font: 1.2rem/1.5 "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            color: #4345e7;
            color: #a61f67;
            padding: 0 .6rem .7rem;
        }

        .val-tooltip ul {
            width: 100%;
            padding: 0 .6rem 0 2.2rem;
            font: 1.1rem/1.64 "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            opacity: .8;
        }

        .val-tooltip ul:not(:only-child) {
            width: 50%;
        }

        .val-tooltip ul li {
            display: list-item;
        }

        .val-tooltip ul li.disabled {
            opacity: .3;
        }

        @media screen and (max-width:667px) {
            .val-tooltip {
                right: 0;
                bottom: 100%;
                top: auto;
                margin: 0 0 1.2rem;
            }

            .val-tooltip:before {
                left: auto;
                right: 1.8rem;
                top: 100%;
                border-width: .5rem .5rem 0;
                border-left-color: rgba(0, 0, 0, 0);
                border-bottom-color: rgba(0, 0, 0, 0);
                border-right-color: rgba(0, 0, 0, 0);
                border-top-color: #fff;
                border-top-color: var(--b);
            }
        }

        .card-holder,
        .card-holder>li {
            width: 100%;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            transform: translateZ(0);
        }

        .card-holder>li {
            -webkit-align-items: stretch;
            -moz-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
        }

        .card-holder>li.c-body {
            margin: 2rem 0 0;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .card-holder>li.c-body>* {
            width: 100%;
        }

        .card-holder>li.c-body>*+* {
            margin: 3rem 0 0;
        }

        @media screen and (max-width:667px) {
            .card-holder>li.c-body>*+* {
                margin: 2.4rem 0 0;
            }
        }

        .c-head .icon-bet,
        .c-head .letter-logo {
            font-size: 3.4rem;
            color: #4345e7;
            color: #a61f67;
            margin: 0 0 3rem;
        }

        .c-head .letter-logo {
            font-weight: 700;
            text-transform: uppercase;
        }

        .c-head h3 {
            font: 600 2.2rem/3rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        }

        .c-head h4 {
            font: 1.4rem/2rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            margin: 2rem 0 0;
        }

        .c-head h4 a {
            color: #4345e7;
            color: #ed1b24;
            font-weight: 700;
        }

        @media (hover:hover) {
            .c-head h4 a:hover {
                color: #6769ec;
                color: var(--hero-hover);
            }
        }

        .a-compact .c-head {
            text-align: center;
        }

        .a-compact .c-head h4 {
            margin: 1rem 0 0;
        }

        .status-icon {
            color: #4fa372;
            color: var(--confirm);
            font-size: 10rem;
            margin: 0 0 3rem;
        }

        .c-footer {
            margin: 3rem 0 0;
        }

        .cf-note-link-holder {
            margin: 2rem 0 0;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        .a-compact .cf-note-link-holder {
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
        }

        .cf-note-link-holder.password-footer {
            margin-top: 10px !important;
        }

        .cf-note-link-holder>* {
            font: 1.4rem/2rem "Open Sans", "Arial", "Helvetica Neue", sans-serif;
            color: #2a63b9;
            color: var(--link);
            cursor: pointer;
            -webkit-transition: color .4s;
            -o-transition: .4s color;
            -moz-transition: .4s color;
            transition: color .4s;
        }

        @media (hover:hover) {
            .cf-note-link-holder>:hover {
                color: #3a76d2;
                color: var(--link-hover);
            }
        }
    </style>
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>

<body>
    <div id="root" class="root-container">
        <ul class="layout-holder signin">

            <li class="l-right">
                <form method="POST" action="{{ route('login') }}" style="width: 100%">
                    @csrf
                    <div class="l-r-content-holder">
                        <ul class="card-holder a-default">
                            <li class="c-head">
                                <div class="icon-bet">
                                    <img src="../../assets/images/Metags-White-JPG.jpeg" alt="">
                                </div>
                                <h3>Sign In</h3>

                            </li>
                            <li class="c-body">
                                <div class="c-input-holder">
                                    <ul class="c-input-label-holder">
                                        <li><span>Email</span></li>
                                    </ul>
                                    <div class="c-input-element-holder"><input type="text" name="email"
                                            placeholder="Email" data-key="email"></div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="c-input-holder">
                                    <ul class="c-input-label-holder">
                                        <li><span>Password</span></li>
                                    </ul>
                                    <div class="c-input-element-holder">
                                        <div>
                                            <div class="icon icon-eye"></div><input type="password" name="password"
                                                placeholder="Password" data-key="password">
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
								 <div class="c-input-holder">
                                    
                                    <div class="c-input-element-holder">
                                        {!! htmlFormSnippet() !!}
                                    </div>
                                    @error('g-recaptcha-response')
                                    <span class="invalid-feedback" style="color:red" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </li>

                            <li class="c-footer"><button class=" button c-undefined"><span>Sign In</span></button>
                            </li>
                        </ul>
                    </div>
                </form>
            </li>
        </ul>
        <div id="notification-wrapper"></div>
    </div>
</body>

</html>