<template>
    <div>
      <div class="py-8 px-8 max-w-4xl mx-auto bg-white rounded-xl3 shadow-md space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
          <div class="text-center space-y-2 sm:text-left">
              <div class="space-y-0.5">
                  <p class="text-lg text-black font-semibold">
                      {{ fundraiser.name }}
                  </p>
                  <star-rating
                      v-model="rating"
                      v-bind:read-only="true"
                      v-bind:increment="0.1"
                      v-bind:star-size="30"
                  />
              </div>
              <p class="text-lg">Reviews:</p>
              <ul>
                  <li v-for="review in fundraiser.reviews" :key="review.id" class="mt-4">
                      <review class="mt-2" v-bind:review="review"></review>
                      <hr>
                  </li>
              </ul>
          </div>
        </div>

        <div class="mt-5 py-8 px-8 max-w-4xl mx-auto bg-white rounded-xl3 shadow-md space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
          <add-review-form v-bind:fundraiser_id="fundraiser.id"></add-review-form>
        </div>
    </div>
</template>

<script>
import StarRating from "vue-star-rating";
import Review from "./Review.vue";

export default {
  props: ["fundraiser"],
  data() {
    return {};
  },
  components: {
    StarRating,
    Review
  },
  computed: {
    rating() {
      const length = this.fundraiser.reviews.length;
      if (length > 0) {
        return (
          this.fundraiser.reviews
            .map((review) => review.rating)
            .reduce((a, b) => a + b) / length
        );
      }
    },
  },
};
</script>
