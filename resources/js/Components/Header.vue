<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <Link class="navbar-brand" href="/">
          <span>
            TrueMedicare Haven
          </span>
        </Link>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <Link :href="route('home')" class="nav-link" :class="{'active': $page.url === '/'}">Home <span class="sr-only">(current)</span></Link>
            </li>
            <li class="nav-item">
              <Link :href="route('about')" class="nav-link" :class="{'active': $page.url === '/about'}">About</Link>
            </li>
            <li class="nav-item">
              <Link class="nav-link" :href="route('department')" :class="{'active': $page.url === '/departments'}">Departments</Link>
            </li>
            <li class="nav-item">
              <Link class="nav-link" :href="route('doctor')" :class="{'active': $page.url === '/alldoctor'}">Doctors</Link>
            </li>
            <li class="nav-item">
              <Link class="nav-link" :href="route('contact')" :class="{'active': $page.url === '/contact_us'}">Contact Us</Link>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary py-2" :href="route('login')">Login / Register</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
</template>
