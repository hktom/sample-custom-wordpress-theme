$(function () {
  function client(params) {
    return `
    <div class="py-3">
    <h3>${params["title"]} / ${params["organisation"]} </h3>
    <p> ${params["commentaire"]} </p>
    </div>
    `;
  }

  function case_study(params) {
    return `
        <div class="casestudy-post d-flex justify-content-start">
        <div class="img-container p-5 d-none d-lg-block">
            <a href="${params["link"]}"> <img src="${params["img"]}" alt=""> </a>
        </div>
        <div class="p-5">
            <h6 class="d-flex justify-content-start align-items-center">
  <a href="${params["link"]}">
  <img src="${params["img"]}" alt="" class="d-lg-none">
  </a>  
  </h6>
            <h3 class="case-title">
    <a href="${params["url"]}">${params["title"]}</a>
  </h3>
            <div>${params["chapeau"]}</div>
            <a class="link" href="${params["link"]}">Lire la suite <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a>
        </div>
    </div>
        `;
  }

  function videos(params) {
    return `<div class="post col-lg-6 col-12 card-img">
        <div class="card">
        <a href="${params["url"]}">
           <img src="${params["img"]}"/>
           </a>
           <div class="card-body">
               <h3 class="card-title">
               <a href="${params["url"]}">
               <span class="iconify" data-icon="bi:play-fill" data-inline="false"></span>
               ${params["title"]}
               </a>
               </h3>
               <div class="post-tag">${convertDate(params["date"])}</div>
           </div>
       </div>
   </div>`;
  }

  function news(params) {
    return `
        <div class="post col-lg-6 col-12 card-img">
     <div class="card">
        <a id="img-box" href="${
          params["link"] ? params["link"] : params["url"]
        }">
        <img src="${params["img"]}"/>
        </a>
        <div class="card-body">
            <div class="post-tag">${params["date"]}</div>
            <h3 class="card-title">
            <a href="${
              params["link"] ? params["link"] : params["url"]
            }">
            ${params["title"]}
            </a>
            </h3>
            <div class="d-flex align-items-end">
              <div class="card-text">${params["description"]}...</div>
              <a class="link" href="${
                params["link"] ? params["link"] : params["url"]
              }"> <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a>
            </div>
        </div>
        </div>
</div>
        `;
  }

  function parole_d_entrepreneurs(params) {
    return `
        <div class="post col-lg-6 col-12 card-img">
     <div class="card">
        <a id="img-box" target="_blank" href="${params["url"]}">
        <img src="${params["img"]}"/>
        </a>
        <div class="card-body">
            <div class="post-tag">${params["date"]}</div>
            <h3 class="card-title">
            <a target="_blank" href="${params["url"]}">
            ${params["title"]}
            </a>
            </h3>
            <div class="d-flex align-items-end">
              <div class="card-text">${params["description"]}...</div>
              <a class="link" target="_blank" href="${params["url"]}"> <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a>
            </div>
        </div>
        </div>
</div>
        `;
  }

  function template_swicher(params, post_type) {
    var template = "";
    switch (post_type) {
      case "clients":
        template = client(params);
        break;
      case "case_studies":
        template = case_study(params);
        break;
      case "parole_d_entrepreneu":
        template = parole_d_entrepreneurs(params);
        break;
      case "videos":
        template = videos(params);
        break;
      default:
        template = news(params);
        break;
    }
    return template;
  }

  function data_reducer(data) {
    let htmlContent = "";
    data.map((item) => {
      if (page > 2) {
        htmlContent += template_swicher(item, post_type);
      }
    });

    return htmlContent;
  }
  var page = 1;
  var offset = 9;
  var per_page = 10;
  var div = $("#infinite-scroll-container");
  var post_type = div.attr("post") || "post";
  var category = div.attr("category") || 0;
  var $container = div.infiniteScroll({
    path: function () {
      page = this.pageIndex;
      offset= (this.pageIndex * per_page)-per_page ;  
      console.log("pageIndex", this.pageIndex, "offset", offset);
      return `/wp-json/infinite/v1/api/${post_type}?category=${category}&per_page=${per_page}&offset=${offset}`;
    },
    responseType: "text",
    status: ".scroll-status",
    history: false,
    checkLastPage: true,
    scrollThreshold: 600,
  });
  $container.infiniteScroll("loadNextPage");
  $container.on("load.infiniteScroll", function (event, response) {
    // offset=offset+9;
    var data = JSON.parse(response);
    var htmlContent = data_reducer(data);
    div.append(htmlContent);
  });
});
