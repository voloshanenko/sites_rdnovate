// Mod: Date Range for Xin Calendar 2 (In-Page/Popup-Window)
// Copyright 2004  Xin Yang    All Rights Reserved.

function setRange(co,jf,fk){if(xc_cu(jf,fk)){xc_eh(co,"el","il",[xc_fw(jf,xcDateFormat,xc_da),xc_fw(fk,xcDateFormat,xc_da)],0)}};function setWeekDays(co,sun,mon,tue,wed,thu,fri,sat){xc_eh(co,"el","ip",{"type":"fc","cn":[sun,mon,tue,wed,thu,fri,sat]},1)};function setDays(co,sun,wk,sat){setWeekDays(co,sun,wk,wk,wk,wk,wk,sat)};function enableRange(co,jf,fk){if(xc_cu(jf,fk)){xc_eh(co,"el","ip",{"type":"io","cn":[xc_fw(jf,xcDateFormat,xc_da),xc_fw(fk,xcDateFormat,xc_da)]},1)}};function disableRange(co,jf,fk){if(xc_cu(jf,fk)){xc_eh(co,"el","ip",{"type":"im","cn":[xc_fw(jf,xcDateFormat,xc_da),xc_fw(fk,xcDateFormat,xc_da)]},1)}};function enableDates(co,ep){var ei=xc_fu(ep);for(var i=0;i<ei.length;i++){xc_eh(co,"el",xc_fw(ei[i],xcDateFormat,xc_da),false,0)}};function disableDates(co,ep){var ei=xc_fu(ep);for(var i=0;i<ei.length;i++){xc_eh(co,"el",xc_fw(ei[i],xcDateFormat,xc_da),true,0)}};function daysBefore(n){return xc_bu(new Date(),-n)};function daysAfter(n){return xc_bu(new Date(),n)};function dayOffset(eb,n){return xc_bu(toJSDate(eb||""),n)};function getWeekBegin(eb,n){var d=toJSDate(eb||"");d.setTime(d.getTime()+xc_dv(7*(n||0)-d.getDay()+xcWeekStart));return toCalendarDate(d)};function getWeekEnd(eb,n){var d=toJSDate(eb||"");d.setTime(d.getTime()+xc_dv(7*(n||0)-d.getDay()+6+xcWeekStart));return toCalendarDate(d)};function getMonthBegin(eb,n){var d=toJSDate(eb||""),jj=new Date(d.getFullYear(),d.getMonth()+(n||0),1);return toCalendarDate(jj)};function getMonthEnd(eb,n){var d=toJSDate(eb||""),hs=new Date(d.getFullYear(),d.getMonth()+(n||0)+1,1);hs.setTime(hs.getTime()-xc_dv(1));return toCalendarDate(hs)};function getYearBegin(n){return xc_cf((new Date()).getFullYear()+(n||0),0,1)};function getYearEnd(n){return xc_cf((new Date()).getFullYear()+(n||0),11,31)};function xc_cu(jf,fk){var bx=xc_ce();return((jf==""||bx.test(jf))&&(fk==""||bx.test(fk)))};function xc_bu(d,n){d.setTime(d.getTime()+xc_dv(n));return toCalendarDate(d)};function xc_fu(ep){return ep.match(new RegExp(aj(),"g"))};function xc_dv(n){return 86400000*n};function xc_ba(ff){var il=this.ge("el","il");if(il!=null){var fs=xc_ck(this.kj,this.month,1);if(ff<=0&&il[0]!=""){var jl=new Date(this.kj,this.month+1,0);var hb=xc_ck(jl.getFullYear(),jl.getMonth(),jl.getDate());if(hb<il[0]){this.kj=il[0].substring(0,4)-0;this.month=il[0].substring(4,6)-1}};if(ff>=0&&il[1]!=""){if(fs>il[1]){this.kj=il[1].substring(0,4)-0;this.month=il[1].substring(4,6)-1}}}};function xc_bj(){var bo=xc_ck(this.ch,this.cf,this.cd);var il=this.ge("el","il");if(il){if(il[0]!=""&&il[0]>bo||il[1]!=""&&bo>il[1]){return true}};var em=this.ge("el",bo);if(em!=null){return em};var ej=false,ip=this.ge("el","ip");if(ip){for(var i=0;i<ip.length;i++){if(ip[i]["type"]=="fc"){ej=ip[i]["cn"][this.ce-xcWeekStart]==0?true:false}else if(ip[i]["type"]=="io"){if(ip[i]["cn"][0]<=bo&&bo<=ip[i]["cn"][1]){ej=false}}else if(ip[i]["type"]=="im"){if(ip[i]["cn"][0]<=bo&&bo<=ip[i]["cn"][1]){ej=true}}}};return ej};
