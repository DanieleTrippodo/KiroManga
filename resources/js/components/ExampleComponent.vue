<template>
    <div class="example-component">
      <h1>{{ title }}</h1>
      <p>{{ message }}</p>
      <button @click="handleClick">Click Me</button>
    </div>
  </template>

  <script>
  export default {
    name: 'ExampleComponent',
    data() {
      return {
        title: 'Hello from Vue 3!',
        message: 'This is an example component using the Options API.',
      };
    },
    methods: {
      handleClick() {
        this.message = 'You clicked the button!';
      },
    },
  };
  </script>

  <style scoped>
  .example-component {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
  }

  button {
    margin-top: 15px;
    padding: 10px;
    font-size: 1rem;
    cursor: pointer;
  }
  </style>
