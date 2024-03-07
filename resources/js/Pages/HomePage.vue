<script setup>
import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
import Slider from '@/Components/Slider.vue';
import Department from '@/Components/Department.vue';
import About from '@/Components/About.vue';
import Doctor from '@/Components/Doctor.vue';
import Contact from '@/Components/Contact.vue';
</script>

<template>
  <div class="hero_area">

    <div class="hero_bg_box">
      <img src="/frontend/assets/images/hero-bg.png" alt="Hero Background">
    </div>

    <!-- header section strats -->
    <Header />
    <!-- end header section -->
    <Slider />
  </div>

  <About />
  
  <Doctor />
  
  <Department />

  <Contact />

  <Footer />

</template>