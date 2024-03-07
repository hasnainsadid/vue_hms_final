<script setup>
  import { Link } from "@inertiajs/vue3";
</script>

<template>
  <!-- footer section -->
<footer class="footer_section">
<div class="container">
  <div class="row">
    <div class="col-md-6 col-lg-3 footer_col">
      <div class="footer_contact">
        <h4>
          Reach at..
        </h4>
        <div class="contact_link_box">
          <a href="">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>
              IDB Bhaban (4th Floor) E/8-A, Rokeya Sharani E/8-A, Rokeya Sharani, Dhaka 1207
            </span>
          </a>
          <a href="">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span>
              02-9183006
            </span>
          </a>
          <a href="">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span>
              isdb-bisew@gmail.com
            </span>
          </a>
        </div>
      </div>
      <div class="footer_social">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-linkedin" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 footer_col">
      <div class="footer_detail">
        <h4>
          About
        </h4>
        <p>
          Beatae provident nobis mollitia magnam voluptatum, unde dicta facilis minima veniam corporis laudantium alias tenetur eveniet illum reprehenderit fugit a delectus officiis blanditiis ea.
        </p>
      </div>
    </div>
    <div class="col-md-6 col-lg-2 mx-auto footer_col">
      <div class="footer_link_box">
        <h4>
          Links
        </h4>
        <div class="footer_links">
          <Link class="active" :href="route('home')">
            Home
          </Link>
          <Link class="" :href="route('about')">
            About
          </Link>
          <Link class="" :href="route('department')">
            Departments
          </Link>
          <Link class="" :href="route('doctor')">
            Doctors
          </Link>
          <Link class="" :href="route('contact')">
            Contact Us
          </Link>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 footer_col ">
      <h4>
        Newsletter
      </h4>
      <form action="#">
        <input type="email" placeholder="Enter email" />
        <button type="submit">
          Subscribe
        </button>
      </form>
    </div>
  </div>
  <div class="footer-info">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <Link :href="route('home')">TrueMedicare Haven</Link>
    </p>
  </div>
</div>
</footer>
<!-- footer section -->
</template>