<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="<?= csrf_token() ?>">

  <title>CMS</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  </link>
  <link rel="stylesheet" href="<?= asset('/cms/css/lib/grapesjs-preset-webpage.min.css') ?>" />
  <!-- <link rel="stylesheet" href="<?= asset('/cms/css/main.css') ?>" /> -->
  <link rel="stylesheet" href="<?= asset('/cms/css/lib/grapes.min.css') ?>" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?= asset('/cms/js/lib/grapes.min.js') ?>"></script>


  <!-- BOOTSTRAP CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> 

  <!-- Grape JS Scripts -->
  <script src="<?= asset('/cms/js/lib/grapesjs-tabs.min.js') ?>"></script>
  <script src="<?= asset('/cms/js/lib/grapesjs-lory-slider.min.js') ?>"></script>
  <script src="<?= asset('/cms/js/lib/grapesjs-touch.min.js') ?>"></script>
  <script src="<?= asset('/cms/js/lib/grapesjs-preset-webpage.min.js') ?>"></script>
  <script src="<?= asset('/cms/js/lib/grapesjs-custom-code.min.js') ?>"></script>


  <!-- SWEET ALERT -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

  <!-- BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>




</head>

<body>

<div class="row-c" style="height:100%">
  <div id="left" class="column" style="flex-basis: 400px;">
  </div>

  <div class="column editor-clm gjs-one-bg">
    <div id="gjs2" style="overflow:hidden;">
      <div style="padding: 25px 50px; margin: 50px 50px 0;" data-gjs-name="Text1">
        Text 1
      </div>
      <div style="padding: 25px 50px; margin: 0 50px;" data-gjs-name="Text2">
        Text 2
      </div>
    </div>
  </div>

  <div id="right" class="column" style="flex-basis: 300px">
  </div>
</div>




<style>
  body,
html {
  margin: 0;
  font: caption;
  height: 100%;
}

#left::-webkit-scrollbar,
#right::-webkit-scrollbar {
  width: 8px;
}

#left::-webkit-scrollbar-thumb,
#right::-webkit-scrollbar-thumb {
  background-color: rgba(255, 255, 255, 0.2);
}

#left::-webkit-scrollbar-track,
#right::-webkit-scrollbar-track {
  background: rgba(0, 0, 0, 0.1);
}

.gjs-pn-panel {
  position: relative;
}

.gjs-pn-panel.gjs-pn-views,
.gjs-pn-panel.gjs-pn-views-container {
  width: 100%;
}

.gjs-pn-panel.gjs-pn-options {
  right: 0;
}

.gjs-pn-panels {
  display: flex;
  flex-direction: row-reverse;
  justify-content: space-between;
}

.row-c {
  display: flex;
  justify-content: flex-start;
  align-items: stretch;
  flex-wrap: nowrap;
}

.column {
  min-height: 75px;
  flex-grow: 1;
  flex-basis: 100%;
  overflow: auto;
}

.editor-clm {
  display: flex;
  flex-direction: column;
}

.gjs-cv-canvas {
  width: 100%;
  height: 100%;
  top: 0;
}

.gjs-blocks-cs {
  border: 1px solid rgba(0, 0, 0, 0.3);
  border-top: none;
}

/* Theming */
.gjs-one-bg {
  background-color: #242a3b;
}

.gjs-two-color {
  color: #9ca8bb;
}

.gjs-three-bg {
  background-color: #1e8fe1;
  color: white;
}

.gjs-four-color,
.gjs-four-color-h:hover {
  color: #1e8fe1;
}

</style>


<script>
  const swv = "sw-visibility";
const expt = "export-template";
const osm = "open-sm";
const otm = "open-tm";
const ola = "open-layers";
const obl = "open-blocks";
const ful = "fullscreen";
const prv = "preview";

const editor = grapesjs.init({
  container: "#gjs2",
  height: "100%",
  fromElement: true,
  storageManager: { type: 0 },


  plugins: [ "gjs-preset-webpage","grapesjs-custom-code", 'grapesjs-lory-slider', 'grapesjs-touch', 'grapesjs-tabs','gjs-blocks-basic'],
pluginsOpts: {
  "gjs-preset-webpage": {},
  'grapesjs-custom-code': {},
  'grapesjs-tabs.min.js': {},
  'grapesjs-lory-slider': {},
  'grapesjs-touch': {},
  'gjs-blocks-basic': {},
},
  panels: {
    defaults: [
      {
        id: "options",
        buttons: [
          {
            active: true,
            id: swv,
            className: "fa fa-square-o",
            command: swv,
            context: swv,
            attributes: { title: "View components" }
          },
          {
            id: prv,
            className: "fa fa-eye",
            command: prv,
            context: prv,
            attributes: { title: "Preview" }
          },
          {
            id: ful,
            className: "fa fa-arrows-alt",
            command: ful,
            context: ful,
            attributes: { title: "Fullscreen" }
          },
          {
            id: expt,
            className: "fa fa-code",
            command: expt,
            attributes: { title: "View code" }
          }
        ]
      },
      {
        id: "views",
        buttons: [
          {
            id: osm,
            className: "fa fa-paint-brush",
            command: osm,
            active: true,
            togglable: 0,
            attributes: { title: "Open Style Manager" }
          },
          {
            id: otm,
            className: "fa fa-cog",
            command: otm,
            togglable: 0,
            attributes: { title: "Settings" }
          },
          {
            id: ola,
            className: "fa fa-bars",
            command: ola,
            togglable: 0,
            attributes: { title: "Open Layer Manager" }
          }
        ]
      },
      {
        id: "left",
        el: "#left",
        resizable: {
          tc: 0,
          cr: 1,
          bc: 0,
          keyWidth: "flex-basis"
        }
      },
      {
        id: "right",
        el: "#right",
        resizable: {
          tc: 0,
          cr: 0,
          cl: 1,
          bc: 0,
          keyWidth: "flex-basis"
        }
      }
    ]
  }
});

const { $ } = editor;

const $left = $("#left");
const $editor = $(".editor-clm");
const $right = $("#right");

editor.on("load", () => {
  $left.append(editor.Blocks.render());
  $right.append([$(".gjs-pn-views"), $(".gjs-pn-views-container")]);
  $editor.prepend($(".gjs-pn-panels"));
});


</script>
</body>

</html>