<template>
    <div>
        <v-img
            :src="src"
            aspect-ratio="1"
            class="grey lighten-2"
            max-width="500"
            max-height="400"
            @click="dialog = true"
        >
            <template v-slot:placeholder>
                <v-row class="fill-height ma-0" align="center" justify="center">
                    <v-progress-circular
                        indeterminate
                        color="grey lighten-5"
                    ></v-progress-circular>
                </v-row>
            </template>
        </v-img>
        <v-row justify="center">
            <v-dialog v-model="dialog" width="600px" height="600px">
                <v-card>
                    <v-card-title>
                        <span class="headline" v-text="poster_name"></span>
                    </v-card-title>
                    <v-card-text>
                        <p v-text="body"></p>
                        <v-img :src="src" aspect-ratio="1">
                            <template v-slot:placeholder>
                                <v-row
                                    class="fill-height ma-0"
                                    align="center"
                                    justify="center"
                                >
                                    <v-progress-circular
                                        indeterminate
                                        color="grey lighten-5"
                                    ></v-progress-circular>
                                </v-row>
                            </template>
                        </v-img>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="#e44d3a" text @click="dialog = false"
                            >Close</v-btn
                        >
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
    </div>
</template>
<script>
export default {
    props: ["src", "body", "poster_name"],
    data: () => ({
        dialog: false
    })
};
</script>
