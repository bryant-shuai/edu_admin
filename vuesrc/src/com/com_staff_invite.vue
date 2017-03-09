<template>
  <div style="width:100%;">
    <div>com_staff_invite</div>

    <v-container fluid style="background:#FF0000;">
      <v-row>
        <v-col xs12 sm6 md4 lg3 style="background:#FFF000;height:200px;">
          
          <v-card horizontal>
            <v-card-row img="..."></v-card-title>
            <v-card-column>
                <v-card-text>
                    <p>...</p>

                    <v-btn>
                      ...
                    </v-btn>
                     
                    <v-btn flat>
                      ...
                    </v-btn>
                     
                    <v-btn success>
                      ...
                    </v-btn>
                     
                    <v-btn block>
                      ...
                    </v-btn>
                     
                    <v-btn outline>
                      ...
                    </v-btn>
                     
                    <v-btn floating>
                      ...
                    </v-btn>
                     
                    <v-btn icon>
                      <v-icon>profile</v-icon>
                    </v-btn>
                     
                    <v-btn icon>
                      <v-icon large>headphones</v-icon>
                    </v-btn>
                     
                    <v-btn floating icon large>
                      <v-icon>edit</v-icon>
                    </v-btn>

                </v-card-text>
                <v-card-row actions>
                    <v-btn flat class="secondary--text">...</v-btn>
                </v-card-row>
            </v-card-column>
          </v-card>

        </v-col>
        <v-col xs6 offset-xs3 style="background:#FFFF00;">
          ...

                    <v-btn floating>
                      ...
                    </v-btn>
                     
                    <v-btn icon>
                      <v-icon>profile</v-icon>
                    </v-btn>
                     
                    <v-btn icon>
                      <v-icon large>headphones</v-icon>
                    </v-btn>
                     
                    <v-btn floating icon large>
                      <v-icon>edit</v-icon>
                    </v-btn>
                    
          <v-btn v-dropdown:dropdown3>
            移动这里
          </v-btn>
          <v-dropdown id="dropdown3" v-bind:items="items" hover></v-dropdown>
        </v-col>
      </v-row>
    </v-container>


    <v-pagination v-bind:length="length" v-model="page"></v-pagination>
  </div>
</template>




<script>

  export default $$.Aaa({

    data() {
      return {
        length: 10,
        page: 1,
        items: [
          { text: '大狗屎/小狗屎', href: '/cate/bbs/大狗屎/小狗屎' },
          { text: 'Link', href: '#!' },
          { text: 'Link', href: '#!' },
          { text: 'Link', href: '#!' },
          { text: 'Link', href: '#!' },
          { text: 'Link', href: '#!' },
        ],
      }
    },

    _init() {
    },

    _change() {
      alert(this.page)
    },

    methods : {

    },

    watch: {
      page() {
        alert(this.page)
      }
    }

  })
</script>
