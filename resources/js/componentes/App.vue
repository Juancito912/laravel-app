<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">
            <a class="navbar-brand" >App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                <router-link to="/proveedores" exact-active-class="active" class="nav-link" >Proveedores</router-link>
                </li>
                <li class="nav-item">
                <router-link to="/banco" exact-active-class="active" class="nav-link" aria-current="page" >Bancos Usados</router-link>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        
        <router-view></router-view>
    </div>
</template>