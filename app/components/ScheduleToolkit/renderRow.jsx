import React from 'react';

const RenderRow = (props) => {
    
    let rows = [];
    let bc;
    let bcMedicine = "#bad2ef";
    let day = '';
    const textAreaRows = props.physicalParent ? '5' : '4';
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
                    {!props.physicalParent &&
                    <input type='text' className='form-control' name={day + 'Time1'} 
                           value={props.myDataProp[day + 'Time1']} onChange={props.updateStateProp} placeholder={'Time...'}/>}
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Activity1'} placeholder={'Activity...'} 
                            value={props.myDataProp[day + 'Activity1']} onChange={props.updateStateProp}></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center '>   
                    {!props.physicalParent &&
                    <input type='text' className='form-control' name={day + 'Time2'} 
                           value={props.myDataProp[day + 'Time2']} onChange={props.updateStateProp} placeholder={'Time...'}/>}
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Activity2'} placeholder={'Activity...'} 
                           value={props.myDataProp[day + 'Activity2']} onChange={props.updateStateProp} ></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center '>  
                    {!props.physicalParent && 
                    <input type='text' className='form-control' name={day + 'Time3'} placeholder={'Time...'}
                           value={props.myDataProp[day + 'Time3']} onChange={props.updateStateProp} />}
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Activity3'} placeholder={'Activity...'} 
                           value={props.myDataProp[day + 'Activity3']} onChange={props.updateStateProp} ></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center '>   
                    {!props.physicalParent &&
                    <input type='text' className='form-control' name={day + 'Time4'} placeholder={'Time...'}
                           value={props.myDataProp[day + 'Time4']} onChange={props.updateStateProp} />}
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Activity4'} placeholder={'Activity...'} 
                           value={props.myDataProp[day + 'Activity4']} onChange={props.updateStateProp} ></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center '>   
                    {!props.physicalParent &&
                    <input type='text' className='form-control' name={day + 'ime5'} placeholder={'Time...'}
                           value={props.myDataProp[day + 'Time5']} onChange={props.updateStateProp} />}
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Activity5'} placeholder={'Activity...'} 
                           value={props.myDataProp[day + 'Activity5']} onChange={props.updateStateProp} ></textarea>
                </div>

                <div className='col p-2 m-1 align-self-center text-center ' >   
                    {!props.physicalParent &&
                    <input type='text' className='form-control' name={day + 'Time6'} placeholder={'Time...'}
                           value={props.myDataProp[day + 'Time6']} onChange={props.updateStateProp} />}
                    <textarea className='form-control' rows={textAreaRows} name={day + 'Activity6'} placeholder={'Activity...'} 
                           value={props.myDataProp[day + 'Activity6']} onChange={props.updateStateProp} ></textarea>
                </div>

            </div>);

    }
    
    return rows;
    
}

export default RenderRow;


