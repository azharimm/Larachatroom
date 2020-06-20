<template>
	<div class="chat">
		<chat-messages></chat-messages>
		<form action="" class="chat__form">
			<textarea
				id="body"
				cols="30"
				rows="4"
				class="chat__form-input"
				v-model="body"
				@keydown="handleMessageInput"
				>
			</textarea>
			<span
				class="chat__form-helptext">
				Hit Return to send or Shift + Return for a new line
			</span>
		</form>
	</div>
</template>

<script>
export default {
	data() {
		return {
			body: null
		}
	},
	methods: {
		handleMessageInput(e) {
			if(e.keyCode === 13 && !e.shiftKey) {
				e.preventDefault();
				this.send()
			}
		},
		send() {
			console.log(this.body)
		}
	}
}
</script>

<style lang="scss">
	.chat {
		background-color: #fff;
		border: 1px solid #d3e0e9;
		border-radius: 3px;

		&__form {
			border-top: 1px solid #d3e0e9;
			padding: 10px;

			&-input {
				width: 100%;
				border: 1px solid #d3e0e9;
				pading: 5px 10px;
				outline: none;
			}

			&-helptext {
				color: #aaa;
			}
		}
	}
</style>