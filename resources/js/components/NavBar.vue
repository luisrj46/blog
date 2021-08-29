<template>
    <div>
        <header class="space-inter">
        <div class="container container-flex space-between">
            <figure class="logo"><img src="img/logo.png" alt=""></figure>
            <nav class="custom-wrapper" id="menu">

                <div class="pure-menu"></div>
                <ul class="container-flex list-unstyled">
                    <li>
                        <router-link class="text-uppercase" :to="{name:'home'}">Inicio</router-link>
                    </li>
                    <li>
                        <router-link class="text-uppercase" :to="{name:'about'}">Nosotros</router-link>
                    </li>
                    <li>
                        <router-link class="text-uppercase" :to="{name:'archive'}">Archivo</router-link>
                    </li>
                    <li>
                        <router-link class="text-uppercase" :to="{name:'contact'}">Contacto</router-link>
                    </li>

                </ul>
            </nav>
        </div>

    </header>
    </div>  

</template>