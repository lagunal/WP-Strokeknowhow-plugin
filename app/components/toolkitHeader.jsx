import React from 'react';

const ToolkitHeader = (props) => {
    return[
        <div key="A" className="metabox metabox--position-up metabox--with-home-link">
            <p><a className="metabox__blog-home-link" href="#" onClick={props.onClick}><i className="fa fa-home" aria-hidden="true"></i> Back to Toolkits Home</a>  </p>
        </div>,
        <div key="B" className="container-fluid">
            <img className="w-100" src={props.pluginUrl + props.banner} />
        </div>
    ];

}

export default ToolkitHeader;




