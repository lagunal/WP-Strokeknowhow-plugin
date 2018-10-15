import React from 'react';

const RenderHelpers = (props) => {
    let rows = [];
    let bc;
    let day = '';
    const textAreaRows = '5';
    for (let i = 1; i <= 7; i++) {
        bc = 'backgroundColor: #ffffff';
        if (i % 2) {
            bc = '#bad2ef';
        }
        switch (i) {
            case 1:
                day='monday'
                break;
            case 2:
                day='tuesday'
                break;
            case 3:
                day='wednesday'
                break;
            case 4:
                day='thursday'
                break;
            case 5:
                day='friday'
                break;    
            case 6:
                day='saturday'
                break;
            case 7:
                day='sunday'
                break;    
        }
        rows.push(
            <div className='row' style={{backgroundColor: bc}}>
                <div className='col align-self-center headline--medium' >   
                    {day}
                </div>
                <div className='col p-2 m-1' >   
                  
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Helper1'} placeholder={'Helper...'} 
                            value={props.myDataProp[day + 'Helper1']} onChange={props.updateStateProp}></textarea>
                </div>
 
                <div className='col p-2 m-1 align-self-center text-center '>   
                   
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Helper2'} placeholder={'Helper...'} 
                           value={props.myDataProp[day + 'Helper2']} onChange={props.updateStateProp} ></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center '>  
                   
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Helper3'} placeholder={'Helper...'} 
                           value={props.myDataProp[day + 'Helper3']} onChange={props.updateStateProp} ></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center '>   
                
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Helper4'} placeholder={'Helper...'} 
                           value={props.myDataProp[day + 'Helper4']} onChange={props.updateStateProp} ></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center '>   
                  
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Helper5'} placeholder={'Helper...'} 
                           value={props.myDataProp[day + 'Helper5']} onChange={props.updateStateProp} ></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center ' >   
                  
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Helper6'} placeholder={'Helper...'} 
                           value={props.myDataProp[day + 'Helper6']} onChange={props.updateStateProp} ></textarea>
                </div>

            </div>);

    }
    
    return rows;
    
}

export default RenderHelpers;


