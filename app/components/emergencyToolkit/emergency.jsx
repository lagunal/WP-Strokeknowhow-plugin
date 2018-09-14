import React, { Component } from 'react';
import PropTypes from 'prop-types';

import RenderMedicines from './renderMedicines';
import fetchWP from '../../utils/fetchWP';
import jsonData from '../../../assets/json/emergencyToolkit.json'; //json used for first time toolkit.
import ToolkitFooter from '../toolkitFooter';
import ToolkitHeader from '../toolkitHeader';

class EmergencyToolkit extends Component {
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
        this.fetchWP.get( 'emergency/' + this.props.wpObject.userID )
        .then(
        (json) => this.setState({
            data: json.value,
        }),
        (err) => console.log( 'error', err )
        );
    };

    updateSetting = () => {
        let jsonData = JSON.stringify(this.state.data);
        this.fetchWP.post( 'emergency/' + this.props.wpObject.userID, { data: jsonData } )
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
            banner={'/assets/images/Banner_Toolkit_Emergency-June.jpg'} />

        <div className="row">
            <div className="col-md-6">
                <div style={styles.title}>ESSENTIAL INFORMATION</div>
                <div className="container" style={{backgroundColor: '#f7f7f4'}}>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="column-header-help" ><strong>HOSPITAL</strong></label>
                            <input type="text" className="form-control" name="hospital1" value={this.state.data.hospital1} 
                                    onChange={this.handleInputChange} />
                                    
                        </div>
                        <div className="col-6 col-md-4">
                            <label className="column-header-help" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="hospital1_phone" value={this.state.data.hospital1_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="column-header-help" ><strong>DOCTOR</strong></label>
                            <input type="text" className="form-control" name="doctor1" value={this.state.data.doctor1} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="column-header-help" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="doctor1_phone" value={this.state.data.doctor1_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col-6 col-md-8">  
                            <label className="column-header-help" ><strong>DOCTOR</strong></label>
                            <input type="text" className="form-control" name="doctor2" value={this.state.data.doctor2} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="column-header-help" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="doctor2_phone" value={this.state.data.doctor2_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="column-header-help" ><strong>DENTIST</strong></label>
                            <input type="text" className="form-control" name="dentist1" value={this.state.data.dentist1} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="column-header-help" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="dentist1_phone" value={this.state.data.dentist1_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="column-header-help" ><strong>PHARMACY</strong></label>
                            <input type="text" className="form-control" name="pharmacy1" value={this.state.data.pharmacy1} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="column-header-help" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="pharmacy1_phone" value={this.state.data.pharmacy1_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="blue-title-light" ><strong>HEALTH INSURANCE PLAN</strong></label>
                            <input type="text" className="form-control" name="insurance1" value={this.state.data.insurance1} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="blue-title-light" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="insurance1_phone" value={this.state.data.insurance1_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="blue-title-light" ><strong>INSURANCE POLICY #</strong></label>
                            <input type="text" className="form-control" name="insurance2" value={this.state.data.insurance2} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="blue-title-light" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="insurance2_phone" value={this.state.data.insurance2_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col">
                            <label className="column-header-help" ><strong>MEDICAL CONDITIONS</strong></label>
                            <input type="text" className="form-control" name="condition1" value={this.state.data.condition1} onChange={this.handleInputChange} />
                        </div>
                    </div>
                </div>

                <div style={styles.titlePhone}>CONTACT PHONE NUMBERS</div>
                <div className="container" style={{backgroundColor: '#f7f7f4'}}>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="column-header-help"><strong>CONTACT PERSON</strong></label>
                            <input type="text" className="form-control" name="contact1" value={this.state.data.contact1} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="column-header-help" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="contact1_phone" value={this.state.data.contact1_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="column-header-help" ><strong>CONTACT PERSON</strong></label>
                            <input type="text" className="form-control" name="contact2" value={this.state.data.contact2} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="column-header-help" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="contact2_phone" value={this.state.data.contact2_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="col-6 col-md-8">
                            <label className="column-header-help" ><strong>CONTACT PERSON</strong></label>
                            <input type="text" className="form-control" name="contact3" value={this.state.data.contact3} onChange={this.handleInputChange} />
                        </div>
                        <div className="col">
                            <label className="column-header-help" ><strong>PHONE</strong></label>
                            <input type="text" className="form-control" name="contact3_phone" value={this.state.data.contact3_phone} onChange={this.handleInputChange} />
                        </div>
                    </div>
                </div>

            </div>

            <div className="col-md-6">
                    <div style={styles.titleMedicine}>MEDICINE</div>
                
                    <div className="container">
                        <RenderMedicines myDataProp = {this.state.data}
                                    updateStateProp = {this.handleInputChange} />
                    </div>
            </div>

            <div className="col-md-12" style={{backgroundColor: '#fffbe1'}}>
                <label><strong>Allergies to medications:</strong></label>
                <input type="text" className="form-control" name="allergies1" value={this.state.data.allergies1} onChange={this.handleInputChange} />
            </div>

        </div>

        {this.state.notice && 
        <div className="col-md-12" style={{color: 'red'}}>
            {this.state.notice.message}
        </div>}

        <ToolkitFooter 
            siteUrl={this.props.wpObject.site_url}
            fileUrl={'/wp-content/uploads/2018/08/StrokeKnowHow_Toolkit_Emergency-May.pdf'} 
            pluginUrl={this.props.wpObject.plugin_url}/>

   
    </form>
        );
    }

}

const styles = {
    title: {
        backgroundColor: 'yellow',
        color: 'black',
        padding: 15, 
        fontWeight: 'bold'
    },
    titlePhone: {
        backgroundColor: 'OrangeRed',
        color: 'white',
        padding: 15,
        fontWeight: 'bold',
        marginTop: 15,
    },
    titleMedicine: {
        backgroundColor: 'RoyalBlue',
        color: 'white',
        padding: 15,
        fonWeight: 'bold'
    }
    
}

EmergencyToolkit.propTypes = {
    wpObject: PropTypes.object
};

export default EmergencyToolkit;

