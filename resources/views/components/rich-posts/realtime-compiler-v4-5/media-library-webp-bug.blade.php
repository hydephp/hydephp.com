<style>
  .responsive-iframe-mlwb {
    width: 100%;
    height: 390px; /* Mobile height */
    border: 0;
    border-radius: 14px;
    color-scheme: dark;
  }
  @media (min-width: 640px) {
    .responsive-iframe-mlwb {
      height: 220px; /* Desktop height */
    }
  }
</style>

<iframe class="responsive-iframe-mlwb" title="Media library with the webp bug" loading="lazy" srcdoc="
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <style>
      :root {
        color-scheme: dark;
      }
      * {
        box-sizing: border-box;
      }
      body {
        margin: 0;
        background: #0f0f12;
        font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
        color: #e7e7ea;
        padding: 16px 16px 0 16px;
      }
      .heading {
        color: #ffffff;
        font-weight: 600;
        font-size: 15px;
        margin-bottom: 14px;
      }
      .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 14px;
      }
      .tile {
        background: #16161b;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        overflow: hidden;
      }
      .thumb {
        height: 104px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
      }
      .thumb.css {
        background: radial-gradient(120% 120% at 30% 20%, #3a2b5c 0%, #16121f 70%);
      }
      .thumb.js {
        background: radial-gradient(120% 120% at 50% 25%, #5a5220 0%, #171507 72%);
      }
      .thumb.bin {
        background: radial-gradient(120% 120% at 50% 30%, #2f2f36 0%, #151518 72%);
      }
      .thumb.img {
        background: url(https://cdn.hydephp.com/previews/new-dashboard/fireworks.jpg) center / cover no-repeat;
      }
      .glyph {
        width: 52px;
        height: 52px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 17px;
        color: #151518;
      }
      .glyph.g-css {
        background: #8b5cf6;
        color: #fff;
        font-family: ui-monospace, monospace;
      }
      .glyph.g-js {
        background: #e6d24a;
      }
      .glyph.g-bin {
        background: #9a9aa3;
      }
      .lab {
        position: absolute;
        bottom: 8px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.03em;
      }
      .lab.l-css {
        color: #b79bff;
      }
      .lab.l-js {
        color: #e6d24a;
      }
      .lab.l-bin {
        color: #a6a6ad;
      }
      .meta {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 10px 11px;
      }
      .bdg {
        font-size: 10px;
        font-weight: 700;
        padding: 4px 6px;
        border-radius: 6px;
      }
      .bdg.css {
        background: rgba(139, 92, 246, 0.16);
        color: #b79bff;
      }
      .bdg.js {
        background: rgba(230, 210, 74, 0.14);
        color: #e6d24a;
      }
      .bdg.webp {
        background: rgba(52, 211, 153, 0.14);
        color: #4ee0ab;
      }
      .bdg.jpg {
        background: rgba(52, 211, 153, 0.14);
        color: #4ee0ab;
      }
      .fn {
        font-size: 13px;
        font-weight: 600;
        line-height: 1.2;
      }
      .sz {
        font-size: 11px;
        color: #6f6f79;
      }
    </style>
  </head>
  <body>
    <div class='heading'>Media gallery excerpt</div>
    <div class='grid'>
      <div class='tile'>
        <div class='thumb css'>
          <div class='glyph g-css'>{}</div>
          <div class='lab l-css'>CSS</div>
        </div>
        <div class='meta'>
          <span class='bdg css'>CSS</span>
          <div>
            <div class='fn'>app.css</div>
            <div class='sz'>53.37 KB</div>
          </div>
        </div>
      </div>
      <div class='tile'>
        <div class='thumb js'>
          <div class='glyph g-js'>JS</div>
          <div class='lab l-js'>JavaScript</div>
        </div>
        <div class='meta'>
          <span class='bdg js'>JS</span>
          <div>
            <div class='fn'>app.js</div>
            <div class='sz'>4.14 KB</div>
          </div>
        </div>
      </div>
      <div class='tile'>
        <div class='thumb bin'>
          <div class='glyph g-bin'>BIN</div>
          <div class='lab l-bin'>BINARY</div>
        </div>
        <div class='meta'>
          <span class='bdg webp'>WEBP</span>
          <div>
            <div class='fn'>fruits.webp</div>
            <div class='sz'>452.11 KB</div>
          </div>
        </div>
      </div>
      <div class='tile'>
        <div class='thumb img'></div>
        <div class='meta'>
          <span class='bdg jpg'>JPG</span>
          <div>
            <div class='fn'>fireworks.jpg</div>
            <div class='sz'>85.85 KB</div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
"></iframe>