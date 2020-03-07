import React from 'react';
import { Form, Input, Button, Row, Col } from 'antd';
import { UserOutlined } from '@ant-design/icons';
import axios from '../utils/axiosInstance';
import { toast } from 'react-toastify';

export const Answer = ({ setQuestion }) => {
    const onFinish = async (values) => {
        const { answer } = values;
        const res = await axios({
            url: `/go?answer=${answer}`,
            method: 'get'
        });
        if (res.data.success) {
            setQuestion('');
            return toast.success('You answered correctly!', {
                position: toast.POSITION.TOP_CENTER,
                autoClose: 1500
            });
        } else {
            return toast.error('Incorrect answer!', {
                position: toast.POSITION.TOP_CENTER,
                autoClose: 1500
            });
        }
    };

    return (
        <Row justify='center' align='middle'>
            <Col span={8}>
                <Form
                    name='normal_login'
                    className='login-form'
                    initialValues={{ remember: true }}
                    onFinish={onFinish}>
                    <Form.Item
                        name='answer'
                        rules={[
                            {
                                required: true,
                                message: 'You cannot submit an empty answer.'
                            }
                        ]}>
                        <Input
                            prefix={
                                <UserOutlined className='site-form-item-icon' />
                            }
                            placeholder='Type your answer here'
                        />
                    </Form.Item>
                    <Form.Item>
                        <div
                            style={{
                                display: 'flex',
                                alignItems: 'center',
                                justifyContent: 'center'
                            }}>
                            <Button
                                type='primary'
                                htmlType='submit'
                                className='login-form-button'>
                                Submit
                            </Button>
                        </div>
                    </Form.Item>
                </Form>
            </Col>
        </Row>
    );
};
