<style>
.error-page-scroll {
  width: 100%;
  overflow-x: auto;
  overflow-y: hidden;
  border-radius: 14px;
  -webkit-overflow-scrolling: touch;
}

.error-page {
  display: block;
  width: 100%;
  min-width: 960;
  max-width: none;
  height: 390px;

  border: 0;
  border-radius: 14px;
  color-scheme: dark;
  background: #0a0a0d;
}
</style>
<div class="error-page-scroll"><iframe title="Trimmed error page" class="error-page" loading="lazy" style="width:100%;height:390px;border:0;border-radius:14px;color-scheme:dark;background:#0a0a0d;" srcdoc="
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
      background: #0a0a0d;
      font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
      color: #e7e7ea;
      font-size: 13px;
    }
    
    .top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 20px;
      border-bottom: 1px solid rgba(255, 255, 255, .07);
    }
    
    .top h1 {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .09em;
      text-transform: uppercase;
      color: #8b8f9c;
      margin: 0;
    }
 
    .tools {
      display: flex;
      align-items: center;
      gap: 14px;
      font-size: 11px;
      color: #8a8a93;
    }
    
    .dot {
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background: #1c1c22;
      border: 1px solid rgba(255, 255, 255, .1);
      display: inline-block;
    }
    
    .copy {
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 8px;
      padding: 6px 10px;
      color: #c9c9d0;
      font-size: 11px;
    }
    
    .wrap {
      display: flex;
    }
    
    .side {
      width: 230px;
      border-right: 1px solid rgba(255, 255, 255, .07);
      overflow: hidden;
      flex-shrink: 0;
    }
    
    .side h2 {
      font-size: 10px;
      letter-spacing: .06em;
      color: #6f6f79;
      padding: 12px 14px 8px;
      margin: 0;
      display: flex;
      justify-content: space-between;
    }
    
    .frame {
      padding: 9px 14px;
      border-bottom: 1px solid rgba(255, 255, 255, .05);
      display: flex;
      gap: 8px;
    }
    
    .frame.active {
      background: rgba(229, 84, 78, .1);
      border-left: 2px solid #e5544e;
      padding-left: 12px;
    }
    
    .fnum {
      width: 16px;
      height: 16px;
      border-radius: 5px;
      background: #e5544e;
      color: #0a0a0d;
      font-size: 10px;
      font-weight: 800;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      margin-top: 1px;
    }
    
    .frame:not(.active) .fnum {
      background: #26262c;
      color: #8a8a93;
    }
    
    .fmeta b {
      display: block;
      font-size: 12px;
      font-weight: 650;
      color: #e7e7ea;
    }
    
    .fmeta span {
      display: block;
      font-size: 10px;
      color: #6f6f79;
      line-height: 1.5;
      font-family: ui-monospace, monospace;
    }
    
    .main {
      flex: 1;
      padding: 16px 20px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    
    .ehead {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    
    .err {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .bang {
      width: 26px;
      height: 26px;
      border-radius: 7px;
      background: rgba(229, 84, 78, .14);
      color: #e5544e;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
    }
    
    .ename {
      font-size: 16px;
      font-weight: 650;
    }
    
    .badge {
      font-size: 11px;
      font-weight: 700;
      color: #e5544e;
      background: rgba(229, 84, 78, .13);
      border: 1px solid rgba(229, 84, 78, .3);
      padding: 2px 7px;
      border-radius: 999px;
    }
    
    .floc {
      font-size: 10px;
      color: #6f6f79;
      font-family: ui-monospace, monospace;
      text-align: right;
    }
    
    .msg {
      font-family: ui-monospace, monospace;
      font-size: 13px;
      color: #cfcfd6;
    }
    
    .msg b {
      color: #e5544e;
      font-weight: 600;
    }
    
    .code {
      background: #111116;
      border: 1px solid rgba(255, 255, 255, .06);
      border-radius: 10px;
      font-family: ui-monospace, 'JetBrains Mono', Menlo, monospace;
      font-size: 11.5px;
      overflow: hidden;
    }
    
    .cline {
      display: flex;
      padding: 2px 0;
    }
    
    .cline.hi {
      background: rgba(229, 84, 78, .1);
      border-left: 2px solid #e5544e;
    }
    
    .ln {
      width: 36px;
      text-align: right;
      color: #4a4a52;
      padding-right: 12px;
      flex-shrink: 0;
      user-select: none;
    }
    
    .hi .ln {
      color: #e5544e;
    }
    
    .code-inner {
      padding: 8px 0;
    }
    
    .k { color: #c792ea; }
    .t { color: #82aaff; }
    .s { color: #c3e88d; }
    .f { color: #89ddff; }
    
    .grid {
      display: flex;
      gap: 12px;
      margin-top: auto;
    }
    
    .panel {
      flex: 1;
      background: #131318;
      border: 1px solid rgba(255, 255, 255, .07);
      border-radius: 10px;
      padding: 10px 12px;
    }
    
    .panel h3 {
      font-size: 10px;
      letter-spacing: .05em;
      color: #6f6f79;
      margin: 0 0 8px;
    }
    
    .row {
      display: flex;
      justify-content: space-between;
      padding: 5px 0;
      font-size: 11px;
      border-bottom: 1px solid rgba(255, 255, 255, .04);
    }
    
    .row:last-child {
      border: 0;
    }
    
    .row span {
      color: #8a8a93;
    }
    
    .row b {
      color: #d5d5db;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class='top'>
    <h1>Exception Handler (Illustration)</h1>
    <div class='tools'>
      <span>Ask AI</span>
      <span class='dot' style='opacity: 0.5; background: whitesmoke;'></span>
      <span class='dot' style='opacity: 0.5; background: darkorange;'></span>
      <span class='dot' style='opacity: 0.5; background: cornflowerblue;'></span>
      <span class='copy'>Copy report</span>
    </div>
  </div>
  
  <div class='wrap'>
    <div class='side'>
      <h2>STACK TRACE <span>9</span></h2>
      <div class='frame active'>
        <div class='fnum'>1</div>
        <div class='fmeta'>
          <b>RouteCollection.php</b>
          <span>Foundation/Kernel/RouteCollection.php:53</span>
        </div>
      </div>
      <div class='frame'>
        <div class='fnum'>2</div>
        <div class='fmeta'>
          <b>Routes.php</b>
          <span>getRoute &middot; Foundation/Facades/Routes.php:50</span>
        </div>
      </div>
      <div class='frame'>
        <div class='fnum'>3</div>
        <div class='fmeta'>
          <b>PageRouter.php</b>
          <span>get &middot; Routing/PageRouter.php:114</span>
        </div>
      </div>
      <div class='frame'>
        <div class='fnum'>4</div>
        <div class='fmeta'>
          <b>PageRouter.php</b>
          <span>getPageFromRoute &middot; Routing/PageRouter.php:36</span>
        </div>
      </div>
      <div class='frame'>
        <div class='fnum'>5</div>
        <div class='fmeta'>
          <b>Router.php</b>
          <span>handle &middot; Routing/Router.php:43</span>
        </div>
      </div>
    </div>
    
    <div class='main'>
      <div class='ehead'>
        <div class='err'>
          <div class='bang'>!</div>
          <div class='ename'>RouteNotFoundException</div>
          <div class='badge'>404</div>
        </div>
        <div class='floc'>RouteCollection.php<br>Line 53</div>
      </div>
      
      <div class='msg'>Route <b>[test]</b> not found.</div>
      
      <div class='code'>
        <div class='code-inner'>
          <div class='cline'>
            <span class='ln'>51</span>&nbsp;&nbsp;
            <span class='k'>public function</span>&nbsp;
            <span class='f'>getRoute</span>(<span class='t'>string</span> $routeKey):&nbsp;<span class='t'>Route</span>
          </div>
          <div class='cline'>
            <span class='ln'>52</span>&nbsp;&nbsp;{
          </div>
          <div class='cline hi'>
            <span class='ln'>53</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class='k'>return</span>&nbsp;$this->get($routeKey) ??&nbsp;<span class='k'>throw new</span>&nbsp;<span class='t'>RouteNotFoundException</span>($routeKey);
          </div>
          <div class='cline'>
            <span class='ln'>54</span>&nbsp;&nbsp;}
          </div>
          <div class='cline'>
            <span class='ln'>55</span>
          </div>
        </div>
      </div>
      
      <div class='grid'>
        <div class='panel'>
          <h3>DOCUMENTATION &amp; LINKS</h3>
          <div class='row'>
            <span>Docs</span>
            <b>hydephp.com/docs</b>
          </div>
          <div class='row'>
            <span>Troubleshooting</span>
            <b>View guide</b>
          </div>
          <div class='row'>
            <span>Report an issue</span>
            <b>GitHub</b>
          </div>
        </div>
        <div class='panel'>
          <h3>ENVIRONMENT &amp; REQUEST</h3>
          <div class='row'>
            <span>PHP</span>
            <b>8.5.7</b>
          </div>
          <div class='row'>
            <span>Hyde / Compiler</span>
            <b>unreleased / dev-master</b>
          </div>
          <div class='row'>
            <span>Request</span>
            <b>GET /test</b>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
"></iframe></div>