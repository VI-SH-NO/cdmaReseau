<template>
  <v-app>
    <div class="wrapper bg-white">
      <section class="cover-sec">
        <img
          :src="user.cover!=null?`/${user.upload_path}${user.cover}`:'/images/default/cover-img.jpg'"
          alt
          id="coverPicture"
          data-toggle="modal"
          data-target="#imagePicker"
          @click="pick_image('cover', 4.2)"
        />
      </section>

      <main>
        <div class="main-section">
          <div class="container">
            <div class="main-section-data">
              <div class="row">
                <div class="col-lg-3">
                  <div class="main-left-sidebar">
                    <div class="user_profile">
                      <Avatar
                        :avatar="
                                                    user.upload_path +
                                                        user.avatar
                                                "
                      />
                      <!--user-pro-img end-->
                      <div class="user_pro_status">
                        <ul class="flw-hr">
                          <li
                            v-if="
                                                            auth.id != user.id
                                                        "
                          >
                            <Follow
                              :user="user"
                              :auth="auth"
                              :is_following="
                                                                is_following
                                                            "
                            ></Follow>
                          </li>
                        </ul>
                        <ul class="flw-status">
                          <li>
                            <span>Following</span>
                            <b v-text="following"></b>
                          </li>
                          <li>
                            <span>Followers</span>
                            <b v-text="followers"></b>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!--user_profile end-->

                    <!--suggestions end-->
                  </div>
                  <!--main-left-sidebar end-->
                </div>
                <div class="col-lg-6">
                  <div class="main-ws-sec">
                    <div class="user-tab-sec">
                      <h3 v-text="client.full_name"></h3>

                      <div class="tab-feed">
                        <ul>
                          <li data-tab="feed-dd" class="active">
                            <a href="#" title>
                              <span>
                                <i class="fas fa-home"></i>
                                Home
                              </span>
                            </a>
                          </li>
                          <li data-tab="info-dd">
                            <a href="#" title>
                              <span>
                                <i class="fas fa-info"></i>
                                Info
                              </span>
                            </a>
                          </li>
                          <li data-tab="portfolio-dd">
                            <a href="#" title>
                              <span>
                                <i class="far fa-folder-open"></i>
                                Media
                              </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <!-- tab-feed end-->
                    </div>
                    <!--user-tab-sec end-->
                    <div class="product-feed-tab current" id="feed-dd">
                      <div class="posts-section">
                        <pfeed :user="user"></pfeed>
                        <!--process-comm end-->
                      </div>
                      <!--posts-section end-->
                    </div>
                    <!--product-feed-tab end-->
                    <div class="product-feed-tab" id="info-dd">
                      <div class="user-profile-ov">
                        <h3>Overview</h3>
                        <p>
                          Lorem ipsum dolor sit amet,
                          consectetur adipiscing elit.
                          Quisque tempor aliquam
                          felis, nec condimentum ipsum
                          commodo id. Vivamus sit amet
                          augue nec urna efficitur
                          tincidunt. Vivamus
                          consectetur aliquam lectus
                          commodo viverra. Nunc eu
                          augue nec arcu efficitur
                          faucibus. Aliquam accumsan
                          ac magna convallis bibendum.
                          Quisque laoreet augue eget
                          augue fermentum scelerisque.
                          Vivamus dignissim mollis est
                          dictum blandit. Nam porta
                          auctor neque sed congue.
                          Nullam rutrum eget ex at
                          maximus. Lorem ipsum dolor
                          sit amet, consectetur
                          adipiscing elit. Donec eget
                          vestibulum lorem.
                        </p>
                      </div>
                    </div>
                    <!--product-feed-tab end-->
                    <div class="product-feed-tab" id="portfolio-dd">
                      <div class="portfolio-gallery-sec">
                        <h3>Portfolio</h3>
                        <div class="gallery_pf">
                          <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                              <div class="gallery_pt">
                                <img src="/images/resources/pf-img1.jpg" alt />
                                <a href="#" title>
                                  <img src="/images/all-out.png" alt />
                                </a>
                              </div>
                              <!--gallery_pt end-->
                            </div>
                          </div>
                        </div>
                        <!--gallery_pf end-->
                      </div>
                      <!--portfolio-gallery-sec end-->
                    </div>
                    <!--product-feed-tab end-->
                  </div>
                  <!--main-ws-sec end-->
                </div>
                <div class="col-lg-3">
                  <Message :receiver="user" v-if="auth.id != user.id" />
                </div>
              </div>
            </div>
            <!-- main-section-data end-->
          </div>
        </div>
      </main>

      <div class="overview-box" id="create-portfolio">
        <div class="overview-edit">
          <h3>Create Portfolio</h3>
          <form>
            <input type="text" name="pf-name" placeholder="Portfolio Name" />
            <div class="file-submit">
              <input type="file" name="file" />
            </div>
            <div class="pf-img">
              <img src="/images/resources/np.png" alt />
            </div>
            <input type="text" name="website-url" placeholder="htp://www.example.com" />
            <button type="submit" class="save">Save</button>
            <button type="submit" class="cancel">Cancel</button>
          </form>
          <a href="#" title class="close-box">
            <i class="la la-close"></i>
          </a>
        </div>
        <!--overview-edit end-->
      </div>
    </div>

    <v-row justify="center">
      <v-dialog v-model="dialog" width="600px" height="1200px">
        <v-card>
          <v-card-title>
            <span class="headline">Use Google's location service?</span>
          </v-card-title>
          <v-card-text>
            <vue-cropper
              ref="cropper"
              :src="'/images/default/cover-img.jpg'"
              alt="Source Image"
              :aspectRatio="ratio"
              :min-container-width="250"
              :min-container-height="250"
            ></vue-cropper>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>

            <v-btn color="green darken-1" text @click="upload">Upload</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  </v-app>
</template>
<script>
import Follow from "../components/follow";
import Avatar from "../components/avatar";
import pfeed from "../feed/pfeed";
import Message from "../messageModal/message";
import VueCropper from "vue-cropperjs";
import "cropperjs/dist/cropper.css";
export default {
  props: {
    user: {
      type: Object
    },
    is_following: {
      type: Boolean
    },
    followers: {
      type: Number
    },
    following: {
      type: Number
    },
    client: {
      type: Object
    }
  },
  data: () => ({
    auth,
    dialog: false,
    type: "avatar",
    ratio: 1
  }),
  mounted() {
    console.log(this.client);
  },
  methods: {
    upload() {
      const width = this.type == "avatar" ? 160 : 1200;
      const height = this.type == "avatar" ? 160 : 170;
      const base64 = this.$refs.cropper
        .getCroppedCanvas({
          imageSmoothingQuality: "medium",
          width: width,
          height: height
        })
        .toDataURL("image/jpeg");
      console.log(base64);
    },
    pick_image(type, ratio) {
      (this.type = type), (this.ratio = ratio);
      this.dialog = true;
      // this.$refs.cropper.();
    },
    change() {
      // Global vars
      var cropper;
      var type;
      var ratio;

      // Register clicks
      $("#uploadProfile").click(upload);
      $("#coverPicture").click(() => {
        type = "cover";

        setUpReaderCropper();
      });
      $("#profilePicture").click(() => {
        type = "avatar";
        ratio = 1.1;
        setUpReaderCropper();
      });

      // Set up image input file
      $("#pickImg").on("change", function(e) {
        setUpReaderCropper();
      });

      function setUpReaderCropper() {
        const reader = new FileReader();
        reader.onload = function() {
          const img = new Image();
          img.src = reader.result;
          img.id = "croppedImg"; // Remember we're give it the same ID, so we can reference it later
          img.width = 1270;
          img.height = 720;
          img.display = "block";
          img.maxWidth = 100;
          $("#imgToCropContainer").empty(); // Clear the container
          $("#imgToCropContainer").append(img); // Then append it

          // init Cropper
          image = document.querySelector("#croppedImg");
          if (cropper) cropper.reset();

          cropper = new Cropper(image, {
            aspectRatio: ratio,
            scalable: false,
            background: false,
            cropBoxResizable: false,
            movable: false,
            dragMode: "move",
            crop(event) {}
          });
        };

        reader.readAsDataURL($("#pickImg").prop("files")[0]);
      }

      // Handle upload click
      function upload() {
        const width = type == "avatar" ? 160 : 1200;
        const height = type == "avatar" ? 160 : 170;
        const base64 = cropper
          .getCroppedCanvas({
            imageSmoothingQuality: "medium",
            width: width,
            height: height
          })
          .toDataURL("image/jpeg");
        const block = base64.split(";");
        const contentType = block[0].split(":")[1];
        const realData = block[1].split(",")[1];
        const img = BlobUtil.base64StringToBlob(realData, contentType);
        const config = {
          header: {
            "Content-Type": "multipart/form-data"
          }
        };
        const data = new FormData();
        data.append("img", img);
        data.append("type", type);
        console.log("type is: " + type);

        axios
          .post("/uploadprofile", data, config)
          .then(res => {
            window.location.reload();
          })
          .catch(err => console.error(err));
      }
    }
  },
  components: {
    Follow,
    pfeed,
    VueCropper,
    Avatar,
    Message
  }
};
</script>
