import React, { Component } from 'react';
import PropTypes from 'prop-types';

import RenderRow from '../ScheduleToolkit/renderRow';
import fetchWP from '../../utils/fetchWP';
import jsonData from '../../../assets/json/physicalToolkit.json'; //json used for first time toolkit.
import ToolkitFooter from '../toolkitFooter';
import ToolkitHeader from '../toolkitHeader';

class PhysicalToolkit extends Component {
    constructor(props) {
        super(props);

        this.state = {
            data: '',
            notice: false,
        }
        this.handleInputChange = this.handleInputChange.bind(this);

        this.fetchWP = new fetchWP({
            restURL: this.props.wpObject.api_url,
            restNonce: this.props.wpObject.api_nonce,
        });
       
    }

    async componentDidMount() {
        try { 
            const data = await this.fetchWP.get( 'physical/' + this.props.wpObject.userID );
            const dataValue = data.value;
            var dataToolkit = [];
            if (dataValue === null) {//if toolkit is new (no data from fetch)
               dataToolkit = jsonData; //assign "empty" json to data for toolkit
            } else {
              dataToolkit = dataValue; //assign existing data from toolkit
            }
            this.setState({ 
              isLoading: false, 
              data: dataToolkit,
            });
        } catch (error) {
            console.log( 'error', error )
        }
 
    }

    updateSetting = () => {
        let jsonData = JSON.stringify(this.state.data);
        this.fetchWP.post( 'physical/' + this.props.wpObject.userID, { data: jsonData } )
        .then(
          (json) => this.processOkResponse(json, 'saved'),
          (err) => console.log('error', err)
        );
    }
    
    processOkResponse = (json, method) => {
        if (json.success) {
            this.setState({
                data: json.value,
                notice: {
                    type: 'success',
                    message: 'Information saved Successfully.',
                }
            });
        } else {
            this.setState({
                notice: {
                    type: 'error',
                    message: 'Information not saved. Please try again later.',
                }
            });
        }
    }

    handleSave = (event) => {
        event.preventDefault();
        this.updateSetting();
       
    }
    
    handleInputChange(event) {
        const target = event.target;
        const value = target.value;
        const name = target.name;
        var data = this.state.data;
       
        for (var key in data){
            if (data.hasOwnProperty(key)) {
                data[key] = (key === name) ? value : data[key];                    
            }
        }
        this.setState({
          data: data
        });
    }

 

    render() {
        return(
      
        <form id="printEmergency" onSubmit={this.handleSave} >

            <ToolkitHeader 
            onClick={this.props.onClick}
            pluginUrl={this.props.wpObject.plugin_url}
            banner={'/assets/images/Banner_Physical Therapy-June.jpg'} />

                <div className="container-fluid border">

                    <RenderRow myDataProp = {this.state.data}
                               updateStateProp = {this.handleInputChange}  
                               physicalParent={'physical'}/>

                </div>

            {this.state.notice && 
            <div className="col-md-12" style={{color: 'red', fontSize: 22}}>
                {this.state.notice.message}
            </div>}
          
             <ToolkitFooter 
                siteUrl={this.props.wpObject.site_url}
                fileUrl={'/wp-content/uploads/2018/09/Interactive_Physical_Therapy.pdf'}
                pluginUrl={this.props.wpObject.plugin_url}/>
     
        </form>
        );
    }

}


PhysicalToolkit.propTypes = {
    wpObject: PropTypes.object
};

export default PhysicalToolkit;

