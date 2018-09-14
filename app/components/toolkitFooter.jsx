import React from 'react';

const ToolkitFooter = (props) => {
    return (
            <div className="col-md-12">
                <div className="mt-3">
                    <button type="submit" name="submit" className="btn btn-primary ml-2"><span className="fa fa-save mr-3"></span>Save</button>
                    <a href={props.siteUrl + props.fileUrl} target="_blank"><button type="button" name="download" className="btn btn-danger ml-4"><span className="fa fa-file-pdf-o mr-3"></span>Download</button></a>
                </div>
                <div>
                    <img className="img-fluid pull-right" src={props.pluginUrl + "/assets/images/Small_Logo-C-b.jpg"} />
                </div>
            </div>

    );
}

export default ToolkitFooter;

