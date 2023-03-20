<template>
  <form>
    <div>
      <label>Name:</label>
      <input type="text" v-model="name">
      <span class="error" v-if="errors.name">{{ errors.name[0] }}</span>
    </div>
    <div>
      <label>Phone:</label>
      <input type="text" v-model="phone">
      <span class="error" v-if="errors.phone">{{ errors.phone[0] }}</span>
    </div>
    <div>
      <label>Feedback:</label>
      <textarea v-model="feedback"></textarea>
      <span class="error" v-if="errors.feedback">{{ errors.feedback[0] }}</span>
    </div>
    <button @click.prevent="submitForm">Submit</button>
    <div  v-if="response">
      <span class="success">{{ response }}</span>
    </div>
  </form>
</template>

<script>
  export default {
    data() {
      return {
        name: '',
        phone: '',
        feedback: '',
        errors: {},
        response: ''
      }
    },
    methods: {
      async submitForm() {
        this.errors = {};
        this.response = '';
          try {
            const response = await axios.post('/feedback-store', {
              name: this.name,
              phone: this.phone,
              feedback: this.feedback
            });
            this.response = response.data.message;
          } catch (error) {
            if (error.response.status === 422) {
              this.errors = error.response.data.errors;
            } else {
              this.response = 'Something went wrong';
            } 
          }
        }
      }
    }
</script>