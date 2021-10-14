<template>
  <div>
    <div>
      <star-rating
        v-model="review.rating"
        v-bind:read-only="true"
        v-bind:increment="1"
        v-bind:star-size="20"
        v-bind:inline="true"
        v-bind:show-rating="false"
      />
      <p class="inline text-md font-medium text-black">{{ review.user.name }}</p>
    </div>
    <p class="text-gray-500">{{ review.review }}</p>
  </div>
</template>

<script>
import StarRating from "vue-star-rating";
export default {
  props: ["review"],
  components: {
    StarRating
  },
};
</script>
