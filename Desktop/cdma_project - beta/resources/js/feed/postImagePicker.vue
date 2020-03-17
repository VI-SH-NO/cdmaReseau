<template>
    <v-row justify="center">
        <v-dialog v-model="dialog" width="600px">
            <template v-slot:activator="{ on }">
                <v-btn color="#e44d3a" dark v-on="on" class="ml-5" icon>
                    <v-icon>fas fa-camera</v-icon>
                </v-btn>
            </template>
            <v-card>
                <v-card-title>
                    <span class="headline">Choose image you like</span>
                </v-card-title>
                <v-card-text>
                    <input
                        type="file"
                        ref="file"
                        :name="uploadFieldName"
                        @change="
                            onFileChange(
                                $event.target.name,
                                $event.target.files
                            )
                        "
                        style="display:none"
                    />
                    <v-textarea
                        v-model="body"
                        name="input-7-1"
                        label="Default style"
                        :no-resize="true"
                        auto-grow
                        row-height="1"
                    ></v-textarea>
                    <v-img
                        :src="imageSrc"
                        aspect-ratio="1.7"
                        contain
                        @click="launchFilePicker"
                    ></v-img>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="#e44d3a" text @click="dialog = false"
                        >Close</v-btn
                    >
                    <v-btn color="#e44d3a" text @click="post">post</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-dialog v-model="errorDialog" max-width="300">
            <v-card>
                <v-card-text class="subheading">{{ errorText }}</v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn @click="errorDialog = false" flat>Got it!</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</template>

<script>
export default {
    name: "image-input",
    data: () => ({
        errorDialog: null,
        errorText: "",
        uploadFieldName: "file",
        maxSize: 1024,
        dialog: false,
        imageSrc: "/images/default/default-img.gif",
        imageFile: null,
        body: ""
    }),
    props: {
        // Use "value" here to enable compatibility with v-model
        value: Object
    },
    methods: {
        launchFilePicker() {
            this.$refs.file.click();
        },
        onFileChange(fieldName, file) {
            const { maxSize } = this;
            let imageFile = file[0];

            //check if user actually selected a file
            if (file.length > 0) {
                let size = imageFile.size / maxSize / maxSize;
                if (!imageFile.type.match("image.*")) {
                    // check whether the upload is an image
                    this.errorDialog = true;
                    this.errorText = "Please choose an image file";
                } else if (size > 1) {
                    // check whether the size is greater than the size limit
                    this.errorDialog = true;
                    this.errorText =
                        "Your file is too big! Please select an image under 1MB";
                } else {
                    // Append file into FormData & turn file into image URL
                    let formData = new FormData();
                    let imageURL = URL.createObjectURL(imageFile);
                    this.imageSrc = imageURL;
                    this.imageFile = imageFile;

                    //   console.log(this.imageURL);
                }
            }
        },
        post() {
            const config = {
                header: {
                    "Content-Type": "multipart/form-data"
                }
            };
            const data = new FormData();
            data.append("img", this.imageFile);
            data.append("api_token", auth.api_token);
            data.append("body", this.body);
            axios
                .post("/api/postImage", data, config)
                .then(res => {
                    this.$store.commit("addPost", res.data);
                    this.dialog = false;
                    this.imageSrc = "/images/default/default-img.gif";
                    this.imageFile = null;
                })
                .catch(err => console.error(err));
        }
    }
};
</script>
