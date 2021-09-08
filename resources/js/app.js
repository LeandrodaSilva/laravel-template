require('./bootstrap');
import * as serviceWorker from "./serviceWorker";
serviceWorker.register();

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
