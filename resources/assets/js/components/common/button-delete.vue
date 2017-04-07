<template>
	<a v-if="! toConfirm" @click.prevent="confirm" href="#" class="btn btn-danger btn-xs">
		<i class="fa fa-trash fa-fw"></i>
	</a>
	<a @click.prevent="destroy" v-else :href="url" class="btn btn-warning btn-xs">
		<i class="fa fa-question fa-fw"></i>
	</a>
</template>

<script>
	export default {
		props: {
			url: String,
			index: Number
		},

		data() {
			return {
				toConfirm: false
			}
		},

		methods: {
			confirm() {
				this.toConfirm = true;
			},

			destroy() {
				axios.delete(this.url).then(response => {
					this.$bus.$emit('delete', this.index);
				});
			}
		}
	}
</script>