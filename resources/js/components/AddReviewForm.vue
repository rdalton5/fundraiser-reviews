<template>
  <form @submit.prevent="submit">
    <h3>Submit a Review:</h3>
    <div class="form-group">
      <star-rating
        v-model="fields.rating"
        v-bind:increment="1"
        v-bind:star-size="30"
        v-bind:inline="true"
        required
      />
      <div v-if="errors && errors.rating" class="text-red-500">{{ errors.rating[0] }}</div>
    </div>
    
    <div class="form-group">
      <textarea required class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
        name="review" id="review" v-model="fields.review">
      </textarea>
      <div v-if="errors && errors.review" class="text-red-500">{{ errors.review[0] }}</div>
    </div>
    <button class="mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      Submit Review
    </button>
    <div v-if="errors && errors.user_id" class="text-red-500">{{ errors.user_id[0] }}</div>
    <div v-if="errors && errors.fundraiser_id" class="text-red-500">{{ errors.fundraiser_id[0] }}</div>
  </form>
</template>

<script>
import StarRating from "vue-star-rating";

export default {
  props: ['fundraiser_id'],
  components: {
    StarRating
  },
  data() {
    return {
      fields: {
        fundraiser_id: this.fundraiser_id
      },
      errors: {},
    }
  },
  methods: {
    async submit() {
      this.errors = {};
      if(!this.fields.rating) {
        this.errors.rating = ["A rating of 1 to 5 stars is required."];
        return;
      }
      try {
        console.log(this.fields);
        const response = await axios.post('/fundraiser-reviews', this.fields);
        location.reload();
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      }
    },
  },
}
</script>
