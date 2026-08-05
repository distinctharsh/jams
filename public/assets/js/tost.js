// =======================================
// Toast Notification
// =======================================
function showToast(type = 'info', message = '', duration = 5000) {
    const colors = {
        success: {
            bar: '#5a9e2f',
            icon: '#3B6D11',
            iconBg: '#EAF3DE'
        },
        error: {
            bar: '#E24B4A',
            icon: '#A32D2D',
            iconBg: '#FCEBEB'
        },
        danger: {
            bar: '#E24B4A',
            icon: '#A32D2D',
            iconBg: '#FCEBEB'
        },
        warning: {
            bar: '#F0AD4E',
            icon: '#A66A00',
            iconBg: '#FFF8E6'
        },
        info: {
            bar: '#0DCAF0',
            icon: '#0A6C7D',
            iconBg: '#E8F9FD'
        }
    };
    const icons = {
        success: "✓",
        error: "✕",
        danger: "✕",
        warning: "!",
        info: "i"
    };
    const titles = {
        success: "Success!",
        error: "Error!",
        danger: "Error!",
        warning: "Warning!",
        info: "Information"
    };
    // Prevent undefined type
    if (!colors[type]) {
        type = "info";
    }
    const c = colors[type];
    let container = document.getElementById("toast-container");
    if (!container) {
        container = document.createElement("div");
        container.id = "toast-container";
        container.style.cssText = `
            position:fixed;
            top:20px;
            right:20px;
            z-index:99999;
            display:flex;
            flex-direction:column;
            gap:10px;
            pointer-events:none;
        `;
        document.body.appendChild(container);
    }
    // Inject CSS once
    if (!document.getElementById("toast-style")) {
        const style = document.createElement("style");
        style.id = "toast-style";
        style.innerHTML = `
            @keyframes toastIn{
                from{
                    transform:translateX(120%);
                    opacity:0;
                }
                to{
                    transform:translateX(0);
                    opacity:1;
                }
            }

            @keyframes toastOut{
                from{
                    transform:translateX(0);
                    opacity:1;
                }
                to{
                    transform:translateX(120%);
                    opacity:0;
                }
            }

            @keyframes toastProgress{
                from{
                    width:100%;
                }
                to{
                    width:0%;
                }
            }
        `;
        document.head.appendChild(style);
    }
    const toast = document.createElement("div");
    toast.style.cssText = `
        min-width:320px;
        max-width:380px;
        background:#fff;
        border-radius:12px;
        box-shadow:0 8px 25px rgba(0,0,0,.15);
        overflow:hidden;
        position:relative;
        display:flex;
        gap:12px;
        align-items:flex-start;
        padding:15px;
        animation:toastIn .35s ease forwards;
        pointer-events:auto;
    `;
    toast.innerHTML = `
        <div style="
            position:absolute;
            left:0;
            top:0;
            bottom:0;
            width:5px;
            background:${c.bar};
        "></div>

        <div style="
            width:32px;
            height:32px;
            border-radius:50%;
            background:${c.iconBg};
            color:${c.icon};
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:bold;
            font-size:16px;
            flex-shrink:0;
        ">
            ${icons[type]}
        </div>

        <div style="flex:1;">
            <div style="
                font-size:15px;
                font-weight:700;
                margin-bottom:4px;
                color:#111;
            ">
                ${titles[type]}
            </div>

            <div style="
                font-size:14px;
                color:#555;
                line-height:1.5;
            ">
                ${message}
            </div>
        </div>

        <button style="
            border:none;
            background:none;
            cursor:pointer;
            color:#999;
            font-size:18px;
            padding:0;
            line-height:1;
        ">
            ×
        </button>

        <div style="
            position:absolute;
            bottom:0;
            left:0;
            height:4px;
            width:100%;
            background:${c.bar};
            animation:toastProgress ${duration}ms linear forwards;
        "></div>
    `;
    container.appendChild(toast);

    function closeToast() {

        toast.style.animation = "toastOut .30s forwards";

        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }
    toast.querySelector("button").addEventListener("click", closeToast);
    setTimeout(closeToast, duration);
}


function togglePassword(){
    let p=document.getElementById("password");
    if(p.type==="password"){
        p.type="text";
    }else{
        p.type="password";

    }
}

let currentFont = 16;
function changeFont(type){
    if(type==1)
        currentFont+=2;
    else if(type==-1)
        currentFont-=2;
    else
        currentFont=16;
    document.documentElement.style.fontSize=currentFont+"px";
}
function toggleContrast(){
    document.body.classList.toggle("high-contrast");
}
function resetAccessibility(){
    currentFont=16;
    document.documentElement.style.fontSize="16px";
    document.body.classList.remove("high-contrast");

}
