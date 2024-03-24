<template>
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="text-center pb-5">
        <h2>
          Get In Touch
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form_container contact-form">
            <Form @submit="formsubmit" :validation-schema="schema" >
              <div class="form-row">
                <div class="col-lg-6">
                  <div>
                    <Field type="text" name="name" v-model="formData.name" placeholder="Your Name" />
                    <ErrorMessage name="name" class="text-danger"/>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <Field type="email" name="email" v-model="formData.email" placeholder="Email" />
                    <ErrorMessage name="email" class="text-danger" />
                  </div>
                </div>
              </div>
              <div>
                <Field type="text" name="subject" v-model="formData.subject" placeholder="Subject" />
                <ErrorMessage name="subject" class="text-danger" />
              </div>
              <div>
                <Field type="text" name="message" v-model="formData.message" class="message-box" placeholder="Message" />
                <ErrorMessage name="message" class="text-danger" />
              </div>
              <div class="btn_box">
                <button type="submit" class="w-25 m-auto d-block mt-4">
                  SEND
                </button>
              </div>
            </Form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->
</template>

<script>
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';

export default {
  components: { Form, Field, ErrorMessage },
  data() {
    return {
      schema: yup.object({
        name: yup.string().required(),
        email: yup.string().email().required(),
        subject: yup.string().required(),
        message: yup.string().required(),
      }),
      formData: {
        name: '',
        email: '',
        subject: '',
        message: ''
      }
    };
  },
  methods: {
    formsubmit() {
      axios.post('/messages', this.formData)
        .then(() => {
          alert('Thanks for your feedback');
          this.formData.name = '';
          this.formData.email = '';
          this.formData.subject = '';
          this.formData.message = '';
        })
        .catch(error => {
          console.error('Error submitting form:', error);
        });
    }
  }
}
</script>
