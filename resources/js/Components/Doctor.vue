<script setup>
import { usePage } from '@inertiajs/vue3';

const {doctors} = usePage().props
</script>

<template>
  <!-- doctor section -->
  <section class="doctor_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Doctors
        </h2>
        <p class="col-md-10 mx-auto px-0">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis quisquam optio unde perspiciatis inventore iure voluptatum enim assumenda, fuga dolor iusto, impedit pariatur laboriosam fugiat culpa voluptatibus esse ex alias molestiae ipsam, officiis sapiente.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-4 mx-auto" v-for="(doctor, index) in doctors">
          <div class="box">
            <div class="img-box" style="height: 350px;">
              <img :src="`images/${doctor.img}`" alt="" height="325px">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a data-toggle="tooltip" :title="`${doctor.phone}`">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                </a>
                <a :href="`mailto:${doctor.email}`" data-toggle="tooltip" :title="`${doctor.email}`">
                  <i class="far fa-envelope" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
                {{doctor.name}}
              </h5>
              <h6 class="">
                {{doctor.designation}}
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end doctor section -->
</template>