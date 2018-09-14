import React, { Component } from 'react';
import PropTypes from 'prop-types';

import RenderMedications from './renderMedications';
import fetchWP from '../../utils/fetchWP';
import jsonData from '../../../assets/json/medicationsToolkit.json'; //json used for first time toolkit.
import ToolkitFooter from '../toolkitFooter';
import ToolkitHeader from '../toolkitHeader';

class MedicationToolkit extends Component {
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
       
        this.getData();
        // dataToolkit = []
        // if (Object.keys(this.state.data).length === 0) {//if toolkit is new (no data from fetch)
        // //dataToolkit = jsonData; //assign "empty" json to data for toolkit
        //     this.setState({
        //         data: jsonData,
        //     });
        // } 
    }

    getData = () => {
        this.fetchWP.get( 'medication/' + this.props.wpObject.userID )
        .then(
        (json) => this.setState({
            data: json.value,
        }),
        (err) => console.log( 'error', err )
        );
        
    };

    updateSetting = () => {
        console.log(this.state.data);
        let jsonData = JSON.stringify(this.state.data);
        this.fetchWP.post( 'medication/' + this.props.wpObject.userID, { data: jsonData } )
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
        const value = target.type === 'checkbox' ? target.checked : target.value;
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
            banner={'/assets/images/Banner_MedicationToolkit-june18.jpg'} />

                <div className="container-fluid border">
            
                    <div className="row " style={{backgroundColor: '#000099'}}> 

                        <div className="col-4 p-2 text-white align-self-center text-center border">
                            Medication Dose
                        </div>
                        <div className="col p-2 text-white border text-center">
                            Time
                        </div>
                        <div className="col p-2 text-white border text-center "> 
                            Monday
                        </div>
                        <div className="col p-2 text-white border text-center">
                            Tuesday
                        </div>
                        <div className="col p-2 text-white border text-center">
                            Wednesday
                        </div>
                        <div className="col p-2 text-white border text-center">
                            Thursday
                        </div>
                        <div className="col p-2 text-white border text-center">
                            Friday
                        </div>
                        <div className="col p-2 text-white border text-center">
                            Saturday
                        </div> 
                        <div className="col p-2 text-white border text-center">
                            Sunday
                        </div>

                    </div>

                    <RenderMedications myDataProp = {this.state.data}
                                    updateStateProp = {this.handleInputChange}  />

                </div>

            {this.state.notice && 
            <div className="col-md-12" style={{color: 'red'}}>
                {this.state.notice.message}
            </div>}
          
             <ToolkitFooter 
                siteUrl={this.props.wpObject.site_url}
                fileUrl={'/wp-content/uploads/2018/09/Medication_Toolkit.pdf'} 
                pluginUrl={this.props.wpObject.plugin_url}/>
       
        </form>
        );
    }

}


MedicationToolkit.propTypes = {
    wpObject: PropTypes.object
};

export default MedicationToolkit;

