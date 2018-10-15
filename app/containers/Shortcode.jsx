import React, { Component } from 'react';
import PropTypes from 'prop-types';
import EmergencyToolkit from '../components/emergencyToolkit/emergency';
import MedicationToolkit from '../components/medicationsToolkit/medication';
import HelpNeededToolkit from '../components/helpNeededToolkit/helpNeeded';
import ScheduleToolkit from '../components/ScheduleToolkit/schedule';
import PhysicalToolkit from '../components/PhysicalToolkit/physical';

class Shortcode extends Component {

  constructor(props) {
    super(props);

    this.state = {
      toolkit: ''
    };

    this.handleCLickEmergency = this.handleCLickEmergency.bind(this);
    this.handleCLickMedication = this.handleCLickMedication.bind(this);
    this.handleCLickHelpNeeded = this.handleCLickHelpNeeded.bind(this);
    this.handleCLickSchedule = this.handleCLickSchedule.bind(this);
    this.handleCLickPhysical = this.handleCLickPhysical.bind(this);
    this.renderHome = this.renderHome.bind(this);

  }

  handleCLickEmergency(e) {
    e.preventDefault();
    this.setState({
      toolkit: 'emergency',
    });
  }
  handleCLickMedication(e) {
    e.preventDefault();
    this.setState({
      toolkit: 'medication',
    });
  }
  handleCLickHelpNeeded(e) {
    e.preventDefault();
    this.setState({
      toolkit: 'helpNeeded',
    });
  }
  handleCLickSchedule(e) {
    e.preventDefault();
    this.setState({
      toolkit: 'schedule',
    });
  }
  handleCLickPhysical(e) {
    e.preventDefault();
    this.setState({
      toolkit: 'physical',
    });
  }

  renderHome(e) {
    e.preventDefault();
    this.setState({
      toolkit: '',
    });
  }

  render() {
  
    let toolkit = this.state.toolkit;

    if (toolkit === 'emergency') {
      return(
        <EmergencyToolkit 
          {...this.props}
          onClick={this.renderHome}
        />
      );   
    }
    if (toolkit === 'medication') {
      return(
        <MedicationToolkit 
          {...this.props}
          onClick={this.renderHome}
        />
      );   
    }
    if (toolkit === 'helpNeeded') {
      return(
        <HelpNeededToolkit 
          {...this.props}
          onClick={this.renderHome}
        />
      );   
    }
    if (toolkit === 'schedule') {
      return(
        <ScheduleToolkit 
          {...this.props}
          onClick={this.renderHome}
        />
      );   
    }
    if (toolkit === 'physical') {
      return(
        <PhysicalToolkit 
          {...this.props}
          onClick={this.renderHome}
        />
      );   
    }

    return (

        <div className="container">
      
            <div className="row">  
                <div className="container-fluid text-center">
                    <img className="img-fluid" src={this.props.wpObject.plugin_url + '/assets/images/SKH_Logo-1b.jpg'} /> 
                    <h1 className="headline--small blue-title">Welcome {this.props.wpObject.userName} !!. Here are your toolkits</h1>
                    <h1 className="headline--small red">Information is available to other members of the family with shared password.</h1>
                    <h1 className="headline--medium blue-title text-center">Toolkits</h1>
                </div>   
            </div>
            <div className="row">
                <div className="col-md-6 zoom">
                  <a href="#" onClick={this.handleCLickMedication}>
                      <img id="image" className="img-thumbnail mx-auto d-block" src={this.props.wpObject.plugin_url + "/assets/images/medicationIcon.png"} />
                  </a>
                </div> 

                <div className="col-md-6 zoom">
                  <a href="#" onClick={this.handleCLickEmergency}>
                    <img className="img-thumbnail img-fluid mx-auto d-block" src={this.props.wpObject.plugin_url + "/assets/images/Toolkit_Emergency-June.jpg"} />
                  </a>
                </div>
            </div>
            <div className="row">
                <div className="col-md-6 zoom">
                  <a href="#" onClick={this.handleCLickSchedule}>
                    <img className="img-thumbnail img-fluid mx-auto d-block" src={this.props.wpObject.plugin_url + "/assets/images/scheduleIcon.png"} />
                  </a>
                </div>

                <div className="col-md-6 zoom">
                  <a href="#" onClick={this.handleCLickPhysical}>
                    <img className="img-thumbnail img-fluid mx-auto d-block" src={this.props.wpObject.plugin_url + "/assets/images/physicalIcon.png"} />
                  </a>
                </div>                
            </div>
            <div className="row">
                <div className="col-md-6 zoom">
                  <a href="#" onClick={this.handleCLickHelpNeeded}>
                    <img className="img-thumbnail img-fluid mx-auto d-block" src={this.props.wpObject.plugin_url + "/assets/images/helpNeededIcon.png"} />
                  </a>
                </div>
            </div>
      </div>
      


    );
  }
}

export default Shortcode;


Shortcode.propTypes = {
 wpObject: PropTypes.object
};