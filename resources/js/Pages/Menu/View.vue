<script>
import stringToSlug from "@/plugins/stringToSlug";
import InputField from "@/Components/Fields/InputField.vue";
import CheckboxField from "@/Components/Fields/CheckboxField.vue";
import JsonEditorComponent from "@/Components/Fields/JsonEditorField.vue";
export default {
  components: {
    stringToSlug,
    InputField,
    CheckboxField,
    JsonEditorComponent,
	
  },
  beforeMount() {
    this.role = this.$page.props.model.role;
    this.modelId = this.$page.props.model.id;

    this.published = this.$page.props.model.published;
    this.jsonData = this.$page.props.model.data;
	
  },
  methods: {
    setErrors(d) {
      let errors = this.flattenObject(d);
      let values = Object.values(errors);
      values = [...values];
      this.errors = values;
    },
    flattenObject(ob) {
      var toReturn = {};

      for (var i in ob) {
        if (!ob.hasOwnProperty(i)) continue;

        if (typeof ob[i] == "object" && ob[i] !== null) {
          var flatObject = this.flattenObject(ob[i]);
          for (var x in flatObject) {
            if (!flatObject.hasOwnProperty(x)) continue;

            toReturn[i + "." + x] = flatObject[x];
          }
        } else {
          toReturn[i] = ob[i];
        }
      }
      return toReturn;
    },

    setRole(data) {
      this.role = data.value;
    },

    setData(data) {
      this.data = JSON.stringify(data.value);
    },

    setPublished(data) {
      this.published = data.value;
    },
  },

  data() {
    return {
      modelId: null,
      role: null,
      jsonData: "",
      published: null,

      errors: [],
    };
  },
};
</script>

<template>
  <AdminLayout>
    <template v-slot:content>
      <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="w-4/5 justify-center text-left mx-5">
          <div class="bg-white rounded px-2 pt-6 pb-8 mb-4">
            <template v-if="errors" v-for="error in errors" :key="error">
              <error-message :error="error" />
            </template>

            <input-field
              name="role"
              label="Enter role"
              fieldType="text"
              @inputChanged="setRole"
              :initialValue="role"
            />
            <!-- <textarea-field name='data' label='Enter data' @inputChanged='setData' />  -->
            <json-editor-component
              name="data"
              label="Set menu in json format"
              @inputChanged="setData"
              editorSettings="menu"
              :initialValue="jsonData"
            />

            <checkbox-field
              name="published"
              label=" Is published"
              @inputChanged="setPublished"
              :initialValue="published"
            />
          </div>
          <!-- end of wrapper-->

          <!-- buttons start -->

          <!-- buttons end -->
        </div>
      </div>
    </template>
  </AdminLayout>
</template>
