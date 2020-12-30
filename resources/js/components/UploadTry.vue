<!-- These are a set of failure methods I've tried to upload files in Vue.js
    Probably they'll come in handy afterwards -->


<!-- HTML5 upload with Vue.js -->

<form enctype="multipart/form-data" novalidate v-if="isInitial || isSaving">
    <h1>Upload images</h1>
    <div class="dropbox">
    <input type="file" multiple :name="uploadFieldName" :disabled="isSaving" @change="filesChange($event.target.name, $event.target.files); fileCount = $event.target.files.length"
        accept="image/*" class="input-file">
        <p v-if="isInitial">
        Drag your file(s) here to begin<br> or click to browse
        </p>
        <p v-if="isSaving">
        Uploading {{ fileCount }} files...
        </p>
    </div>
</form>


<!-- Vue.js component -->

import VueUploadComponent from 'vue-upload-component';

<VueUploadComponent
    ref="upload"
    v-model="files"
    post-action="/post.method"
    put-action="/put.method"
    @input-file="inputFile"
    @input-filter="inputFilter"
>
Upload file
</VueUploadComponent> 


<!-- Creating a new Vue App -->


<div id="app_upload">
<div v-if="!image">
    <h2>Select an image</h2>
    <input type="file" @change="onFileChange">
</div>
<div v-else>
    <img :src="image" />
    <button @click="removeImage">Remove image</button>
</div>
</div>



new Vue({
    el: '#app_upload',
    data: {
        image: ''
    },
    methods: {
        onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length)
            return;
        this.createImage(files[0]);
        },
        createImage(file) {
        var image = new Image();
        var reader = new FileReader();
        var vm = this;

        reader.onload = (e) => {
            vm.image = e.target.result;
        };
        reader.readAsDataURL(file);
        },
        removeImage: function (e) {
        this.image = '';
        }
    }
})


