!function(){"use strict";var e=window.wp.element,t=window.wp.blocks,o=window.wp.components,r=window.wp.data,s=window.wp.coreData,n=window.wp.blockEditor;(0,t.registerBlockType)("core/resort-now",{apiVersion:2,title:"Resort Now",icon:"universal-access-alt",category:"media",attributes:{message:{type:"string",source:"text",selector:"div",default:""}},edit:t=>{let{setAttributes:i,attributes:a}=t;const c=(0,n.useBlockProps)(),l=(0,r.useSelect)((e=>e("core/editor").getCurrentPostType()),[]),[w,p]=(0,s.useEntityProp)("postType",l,"meta"),u=w.resort_now;return(0,e.createElement)("div",c,(0,e.createElement)(o.TextControl,{label:"Meta Block Field",value:u,onChange:e=>{p({...w,resort_now:e})}}))},save:()=>{const t=(0,r.useSelect)((e=>e("core/editor").getCurrentPostType()),[]),[o,n]=(0,s.useEntityProp)("postType",t,"meta"),i=o.resort_now;return(0,e.createElement)("p",null,i)}})}();