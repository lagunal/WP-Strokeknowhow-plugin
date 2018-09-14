import React from 'react';

const RenderMedicines = (props) => {
    
    let medicines = [];
    let bc;
    let classTitle;
    for (let i = 1; i <= 8; i++) {
        bc = 'backgroundColor: #ffffff';
        classTitle = 'blue-title';
        if (i % 2) {
            bc = '#f7f7f4';
            classTitle = 'blue-title-light';
        }
        medicines.push(
            <div className='form-row' style={{backgroundColor: bc}}>
                <div className='col'>   
                    <label className= {classTitle}><strong>MEDICATION</strong></label>
                    <input type='text' className='form-control' name={'medication' + i} 
                           value={props.myDataProp['medication' + i]} onChange={props.updateStateProp} />
                </div>
            </div>);
        medicines.push(    
           <div className='form-row' style={{backgroundColor: bc}}>
                <div className='col'>
                    <label className= {classTitle} ><strong>DOSAGE</strong></label>
                    <input type='text' className='form-control' name={'medication_dosage' + i} 
                            value={props.myDataProp['medication_dosage' + i]} onChange={props.updateStateProp}/>
                </div>
                <div className='col'>
                    <label className= {classTitle} ><strong>PURPOSE</strong></label>
                    <input type='text' className='form-control' name={'medication_purpose' + i} 
                            value={props.myDataProp['medication_purpose' + i]} onChange={props.updateStateProp}/>
                </div>
            </div>);
    }
    
    return medicines;
    
}

export default RenderMedicines;


