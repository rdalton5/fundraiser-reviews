<template>
  <div class="py-8 px-8 max-w-lg mx-auto bg-white rounded-xl3 shadow-md space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
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
      <div class="mt-2">
        <a 
          v-bind:href="'/fundraisers/' + fundraiser.id"
          class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
          See Reviews
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import StarRating from "vue-star-rating";

export default {
  props: ["fundraiser"],
  data() {
    return {};
  },
  components: {
    StarRating,
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
