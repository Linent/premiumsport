(()=>{"use strict";const e=window.wc.__experimentalInteractivity,o={woocommerce:{productGalleryLargeImage:{styles:({context:e})=>{const{styles:o}=e.woocommerce;return Object.entries(null!=o?o:[]).reduce(((e,[o,c])=>{const t=`${o}:${c};`;return e.length>0?`${e} ${t}`:t}),"")}}}};let c=!1;const t=e=>{e.woocommerce.styles&&(e.woocommerce.styles.transform="scale(1.0)",e.woocommerce.styles["transform-origin"]="")};(0,e.store)({selectors:o,actions:{woocommerce:{handleMouseMove:({event:e,context:o})=>{if(!e.target.classList.contains("wc-block-woocommerce-product-gallery-large-image__image"))return void t(o);const c=e.target,n=e.offsetX/c.clientWidth*100,r=e.offsetY/c.clientHeight*100;o.woocommerce.styles&&(o.woocommerce.styles.transform="scale(1.3)",o.woocommerce.styles["transform-origin"]=`${n}% ${r}%`)},handleMouseLeave:({context:e})=>{t(e)},handleClick:({context:e,event:o})=>{o.target.classList.contains("wc-block-product-gallery-dialog-on-click")&&(e.woocommerce.isDialogOpen=!0)}}},effects:{woocommerce:{scrollInto:e=>{e.selectors.woocommerce.isSelected(e)&&(e.context.woocommerce.isDialogOpen===c&&e.ref.scrollIntoView({behavior:"smooth",block:"nearest",inline:"center"}),e.context.woocommerce.isDialogOpen&&e.context.woocommerce.isDialogOpen!==c&&e.ref.closest("dialog")&&(e.ref.scrollIntoView({behavior:"instant",block:"nearest",inline:"center"}),c=e.context.woocommerce.isDialogOpen),e.context.woocommerce.isDialogOpen||e.context.woocommerce.isDialogOpen===c||(e.ref.scrollIntoView({behavior:"instant",block:"nearest",inline:"center"}),c=e.context.woocommerce.isDialogOpen))}}}})})();