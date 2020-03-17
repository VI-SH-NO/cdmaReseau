<template>
  <div>
    <v-app>
      <div class="wrapper bg-white" v-if="show">
        <main>
          <div class="main-section">
            <div class="container">
              <div class="main-section-data">
                <div class="row">
                  <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                    <div class="main-left-sidebar no-margin">
                      <div class="user-data full-width">
                        <div class="user-profile">
                          <div class="username-dt">
                            <div class="usr-pic">
                              <img :src="`/${auth.upload_path}/${auth.avatar}`" />
                            </div>
                          </div>
                          <!--username-dt end-->
                          <div class="user-specs">
                            <!-- <h3 v-text="auth.client?auth.client.full_name:auth.company.sigle"></h3> -->
                          </div>
                        </div>
                        <!--user-profile end-->
                        <ul class="user-fw-status">
                          <li>
                            <a :href="`/u/${auth.id}`" title>
                              View
                              Profile
                            </a>
                          </li>
                        </ul>
                      </div>
                      <suggestion />
                    </div>
                    <!--main-left-sidebar end-->
                  </div>
                  <div class="col-lg-6 col-md-8 no-pd">
                    <div class="main-ws-sec">
                      <Feed />
                    </div>
                    <!--main-ws-sec end-->
                  </div>
                  <div class="col-lg-3 pd-right-none no-pd">
                    <div class="right-sidebar">
                      <div class="widget widget-about">
                        <img src="images/wd-logo.png" alt />
                        <h3>Track Time on Workwise</h3>
                        <span>Pay only for the Hours worked</span>
                        <div class="sign_link">
                          <h3>
                            <a href="sign-in.html" title>Sign up</a>
                          </h3>
                          <a href="#" title>Learn More</a>
                        </div>
                      </div>
                      <!--widget-about end-->

                      <suggestion />
                    </div>
                    <!--right-sidebar end-->
                  </div>
                </div>
              </div>
              <!-- main-section-data end-->
            </div>
          </div>
        </main>

        <!--post-project-popup end-->

        <!--post-project-popup end-->
      </div>
      <div v-if="!show" class="process-comm mx-auto" style="margin-top:250px">
        <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
        </div>
      </div>
    </v-app>
  </div>
</template>
<script>
import Feed from "../feed/feed";
import suggestion from "../components/suggestion";
export default {
  data() {
    return {
      auth,
      show: false
    };
  },
  mounted() {
    setTimeout(() => {
      this.show = true;
    }, 2000);
  },
  components: {
    Feed,
    suggestion
  }
};
</script>