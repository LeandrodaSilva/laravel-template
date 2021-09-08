require('./bootstrap');
import * as serviceWorker from "./app/serviceWorker";
serviceWorker.register();

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
