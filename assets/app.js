/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
import $ from 'jquery';

global.$ = global.jQuery = $;

import './js/jquery.star-rating-svg.min';
import './js/custom';

import { Modal } from 'bootstrap';