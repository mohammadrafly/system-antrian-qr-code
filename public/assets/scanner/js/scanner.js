(function() {
  var app;
  var route = "Shopping/getPro/";

  app = new Vue({
    el: '#app',
    data: {
      scanner: null,
      activeCameraId: null,
      cameras: [],
      scans: []
    },
    mounted: function() {
      var self;
      self = this;
      self.scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        scanPeriod: 3,
        mirror: false
      });
      self.scanner.addListener('scan', function(content, image) {
        $("#code").val(content);
        document.getElementById("myForm").submit();
        // return window.location = route;
      });
      return Instascan.Camera.getCameras().then(function(cameras) {
        self.cameras = cameras;
        if (cameras.length > 0) {
          if (cameras[1]) {
            self.activeCameraId = cameras[1].id;
            return self.scanner.start(cameras[1]);
          } else {
            self.activeCameraId = cameras[0].id;
            return self.scanner.start(cameras[0]);
          }
        } else {
          return console.error('No cameras found.');
        }
      }).catch(function(e) {
        return console.error(e);
      });
    },
    methods: {
      formatName: function(name) {
        return name || '(unknown)';
      },
      selectCamera: function(camera) {
        this.activeCameraId = camera.id;
        return this.scanner.start(camera);
      }
    }
  });

}).call(this);
