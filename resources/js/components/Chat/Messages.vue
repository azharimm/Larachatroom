<template>
	<div class="chat__messages" ref="messages">
		<chat-message
			v-for="(message, index) in messages"
			:key="message.id"
			:message="message">
		</chat-message>
	</div>
</template>

<script>
import Bus from '../../bus'

export default {
	data() {
		return {
			messages: []
		}
	},
	mounted() {
		axios.get('/chat/messages').then(response => {
			this.messages = response.data;
		});

		//listen bus
		Bus.$on('message.added', (message) => {
			this.messages.unshift(message);

			if(message.selfOwned) {
				this.$refs.messages.scrollTop = 0;
			}
		})
	}
}
</script>

<style lang="scss">
	.chat {
		&__messages {
			height: 400px;
			max-height: 400px;
			overflow-y: auto;
		}
	}
</style>