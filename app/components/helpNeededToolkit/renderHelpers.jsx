import React from 'react';

const RenderHelpers = (props) => {
    
    let rows = [];
    let bc;
    let bcMedicine = "#bad2ef";
    for (let i = 1; i <= 18; i++) {
        bc = 'backgroundColor: #ffffff';
        if (i % 2) {
            bc = '#bad2ef';
        }
        rows.push(
            <div className='row' style={{backgroundColor: bc}}>
                <div className='col-4 align-self-center' >   
                    <input type='text' className='form-control' name={'helper' + i} 
                           value={props.myDataProp['helper' + i]} onChange={props.updateStateProp} />
                </div>
                <div className='col p-2 m-1 align-self-center text-center border'>   
                    <input type='checkbox' name={'monday' + i} 
                           checked={props.myDataProp['monday' + i]} onChange={props.updateStateProp} />
                </div>
                <div className='col p-2 m-1 align-self-center text-center border'>   
                    <input type='checkbox' name={'tuesday' + i} 
                           checked={props.myDataProp['tuesday' + i]} onChange={props.updateStateProp} />
                </div>
                <div className='col p-2 m-1 align-self-center text-center border'>   
                    <input type='checkbox' name={'wednesday' + i} 
                           checked={props.myDataProp['wednesday' + i]} onChange={props.updateStateProp} />
                </div>
                <div className='col p-2 m-1 align-self-center text-center border'>   
                    <input type='checkbox' name={'thursday' + i}  
                           checked={props.myDataProp['thursday' + i]} onChange={props.updateStateProp} />
                </div>
                <div className='col p-2 m-1 align-self-center text-center border' >   
                    <input type='checkbox' name={'friday' + i} 
                           checked={props.myDataProp['friday' + i]} onChange={props.updateStateProp} />
                </div>
                <div className='col p-2 m-1 align-self-center text-center border'>   
                    <input type='checkbox' name={'saturday' + i} 
                           checked={props.myDataProp['saturday' + i]} onChange={props.updateStateProp} />
                </div>
                <div className='col p-2 m-1 align-self-center text-center border' >   
                    <input type='checkbox' name={'sunday' + i} 
                           checked={props.myDataProp['sunday' + i]} onChange={props.updateStateProp} />
                </div>
            </div>);

    }
    
    return rows;
    
}

export default RenderHelpers;


